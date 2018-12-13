<?php
/**
 * This class handles Instagram API connection
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

class EnjoyInstagram_Api_Connection {

    /**
     * Single plugin instance
     * @since 9.0.0
     * @var \EnjoyInstagram_Api_Connection
     */
    protected static $instance;

    /**
     * String Access Token
     * @var string
     */
    public $access_token = '';

    /**
     * Returns single instance of the class
     *
     * @return \EnjoyInstagram_Api_Connection
     * @since 1.0.0
     */
    public static function get_instance(){
        if( is_null( self::$instance ) ){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Construct
     *
     * @return void
     */
    private function __construct(){
        $this->access_token = get_option('enjoyinstagram_access_token', '');
    }

    /**
     * Handle curl connection to API
     *
     * @since 9.0.0
     * @param string $api_url
     * @return mixed
     * @author Francesco Licandro
     */
    private function _curl_connect( $api_url ){
        try {
            $connection_c = curl_init(); // initializing
            curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
            curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, true ); // return the result, do not print
            curl_setopt( $connection_c, CURLOPT_TIMEOUT, 30 );
            curl_setopt($connection_c, CURLOPT_SSL_VERIFYPEER, false);
            $json_return = curl_exec( $connection_c ); // connect and get json data
            curl_close( $connection_c ); // close connection
            return json_decode( $json_return, true ); // decode and return
        }
        catch( Exception $e ) {
            return array();
        }
    }

    /**
     * Get data
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $url
     * @param integer $count
     * @param array $hashtags
     * @return array
     */
    private function _get_data( $url, $count, $hashtags ) {

        $result         = $this->_curl_connect( $url );
        $res            = $result;
        $res['data']    = array(); // reset data
        $hashtags       = array_filter( $hashtags ); // be sure to remove empty values

        if( ! isset( $result['data'] ) ) {
            return $res;
        }

        foreach( $result['data'] as $post ) {
            if( ! empty( $hashtags ) ){
                foreach( $hashtags as $hash ){
                    if( in_array( $hash, $post["tags"] ) && ! in_array( $post, $res['data'] ) ){
                        array_push( $res['data'], $post );
                    }
                }
            } else{
                array_push( $res['data'], $post );
            }
        }

        if( $count >= 33 && isset( $result['pagination']['next_url'] ) ){
            for( $i=1; $i<($count/33); $i++ ){
                $result = $this->_curl_connect( $result['pagination']['next_url'] );
                if( ! is_null($result['data']) ){
                    foreach( $result['data'] as $post ) {
                        if( count( $res['data'] ) == $count ) {
                            break;
                        }

                        if( ! empty( $hashtags ) ){
                            foreach( $hashtags as $hash ){
                                if( in_array( $hash, $post["tags"] ) && ! in_array( $post, $res['data'] ) ){
                                    array_push( $res['data'], $post );
                                }
                            }
                        } else {
                            array_push( $res['data'], $post );
                        }
                    }
                }
            }
        }

        return $res;
    }

    /**
     * Get user info
     *
     * @since 9.0.0
     * @param string $user
     * @param string $access_token
     * @author Francesco Licandro
     * @return array
     */
    public function get_user_info( $access_token = '', $user = '' ){
        if( ! $access_token  ) {
            return array();
        }

        $url = 'https://api.instagram.com/v1/users/self/?access_token='.$access_token;
        return $this->_curl_connect( $url );
    }

    /**
     * Get user by name
     *
     * @param $user
     * @param integer $count
     * @param $account_name
     * @param string $hashtag
     * @return array|boolean
     */
    public function get_user_by_name( $user, $count, $account_name, $hashtag = '' ){

        if( ! $this->access_token ) {
            return false;
        }

        $user_name  = strtolower( $account_name ); // sanitization
        $user_id    = '';
        $url        = "https://api.instagram.com/v1/users/search?q=".$user_name."&access_token=".$this->access_token;
        $json       = $this->_curl_connect( $url );
        if( empty( $json ) || ! isset( $json['data'] ) ) {
            return false;
        }

        foreach( $json['data'] as $user ) {
            if($user['username'] == $user_name) {
                $user_id = $user['id'];
            }
        }
        if( ! $user_id ) {
            return false;
        }

        $hashtags       = explode(',', $hashtag);
        $url            = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent?count='.$count.'&access_token='.$access_token;
        return $this->_get_data( $url, $count, $hashtags );
    }

    /**
     * Get user
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $user
     * @param integer $count
     * @param string $hashtag
     * @return array|boolean
     */
    public function get_user( $user, $count, $hashtag = "" ){
        $hashtags       = explode( ',', $hashtag );
        $url            = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$this->access_token;

        return $this->_get_data( $url, $count, $hashtags );
    }

    /**
     * Get user code
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $user
     * @param integer $count
     * @return string
     */
    public function get_user_code( $user, $count ){

        if( ! $this->access_token ) {
            return '';
        }

        $url            = 'https://api.instagram.com/v1/users/self/media/recent?count='.$count.'&access_token='.$this->access_token;
        $result         = $this->_curl_connect( $url );

        return isset( $result['meta']['code'] ) ? $result['meta']['code'] : '';
    }

    /**
     * Get a media
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $user
     * @param string $media
     * @return array
     */
    public function get_media( $user, $media ){

       if( ! $this->access_token ) {
           return array();
       }

       $url            = 'https://api.instagram.com/v1/media/'.$media.'?access_token='.$this->access_token;
       return $this->_curl_connect( $url );
    }

    /**
     * Get likes
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $user
     * @param integer $count
     * @return array
     */
    public function get_likes( $user, $count ){

        if( ! $this->access_token ) {
            return array();
        }

        $url = 'https://api.instagram.com/v1/users/self/media/liked?count='.$count.'&access_token='.$this->access_token;

        return $this->_get_data( $url, $count, array() );
    }

    /**
     * Get likes code
     *
     * @since 9.0.0
     * @author Francesco Licandro
     * @param string $user
     * @param string $count
     * @return string
     */
    public function get_likes_code($user,$count){

        if( ! $this->access_token ) {
            return '';
        }

        $url    = 'https://api.instagram.com/v1/users/self/media/liked?count='.$count.'&access_token='.$this->access_token;
        $result = $this->_curl_connect( $url );

        return isset( $result['meta']['code'] ) ? $result['meta']['code'] : '';
    }

    /**
     * Get hash
     *
     * @author Francesco Licandro
     * @since 9.0.0
     * @param string $hashtag
     * @param string $count
     * @return array
     */
    public function get_hash( $hashtag, $count ){

        if( ! $this->access_token ) {
            return array();
        }

        // get first
        $hashtags       = explode("%2C", $hashtag);
        $result         = array();
        $res['data']    = array();
        $ht             = '';
        $i              = 0;

        while( sizeof( $res['data'] ) < $count ){
            if( $i && ( ! isset( $result[$ht][$i-1]['pagination']['next_url']) ) ) {
                break;
            }
            foreach( $hashtags as $ht ){

                if( $i ){
                    $url = $result[$ht][$i-1]['pagination']['next_url'];
                } else {
                    $url = 'https://api.instagram.com/v1/tags/'.$ht.'/media/recent?count='.$count.'&access_token='.$this->access_token;
                }

                $result[$ht][$i] = $this->_curl_connect( $url );
                if ( is_null( $result[$ht][$i] ) ){
                    if( ( $key = array_search( $ht, $hashtags ) ) !== false ) {
                        unset( $hashtags[$key] );
                    }
                } else {
                    foreach( $result[$ht][$i]['data'] as $post ) {
                        array_push( $res['data'], $post );
                    }
                }
            }
            $i++;
        }

        if( empty( $res['data'] ) ) {
            return array();
        }

        enjoyinstagram_shuffle_assoc( $res['data'] );
        $res['data'] = array_slice( $res['data'], 0, $count );

        return $res;
    }

    /**
     * Get hash code
     *
     * @param string $hashtag
     * @param string $count
     * @return string
     */
    public function get_hash_code( $hashtag, $count ){

        if( ! $this->access_token ) {
            return '';
        }

        $url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?count='.$count.'&access_token='.$this->access_token;
        $result = $this->_curl_connect( $url );

        return isset( $result['meta']['code'] ) ? $result['meta']['code'] : '';
    }
}

/**
 * Unique access to instance of EnjoyInstagram_Api_Connection class
 *
 * @return \EnjoyInstagram_Api_Connection
 * @since 9.0.0
 */
function EnjoyInstagram_Api_Connection() {
    return EnjoyInstagram_Api_Connection::get_instance();
}