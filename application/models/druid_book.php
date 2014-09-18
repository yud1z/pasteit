<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_book extends druid_content 
{

  var $book_id;
  var $book_nama;
  var $book_email;
  var $book_phone;
  var $book_company;
  var $book_message;
  var $book_date;

  
  /**
   * @function _getBook_id().
   * @abstract Get book_id.
   *
   * @return book_id.
   */
  function _getBook_id()
  {
      return $this->book_id;
  }
  
  /**
   * @function _setBook_id().
   * @abstract Set book_id.
   *
   * @param book_id the value to set.
   */
  function _setBook_id($book_id = '')
  {
      $this->book_id = $book_id;
  }
  
  /**
   * @function _getBook_nama().
   * @abstract Get book_nama.
   *
   * @return book_nama.
   */
  function _getBook_nama()
  {
      return $this->book_nama;
  }
  
  /**
   * @function _setBook_nama().
   * @abstract Set book_nama.
   *
   * @param book_nama the value to set.
   */
  function _setBook_nama($book_nama = '')
  {
      $this->book_nama = $book_nama;
  }
  
  /**
   * @function _getBook_email().
   * @abstract Get book_email.
   *
   * @return book_email.
   */
  function _getBook_email()
  {
      return $this->book_email;
  }
  
  /**
   * @function _setBook_email().
   * @abstract Set book_email.
   *
   * @param book_email the value to set.
   */
  function _setBook_email($book_email = '')
  {
      $this->book_email = $book_email;
  }
  
  /**
   * @function _getBook_phone().
   * @abstract Get book_phone.
   *
   * @return book_phone.
   */
  function _getBook_phone()
  {
      return $this->book_phone;
  }
  
  /**
   * @function _setBook_phone().
   * @abstract Set book_phone.
   *
   * @param book_phone the value to set.
   */
  function _setBook_phone($book_phone = '')
  {
      $this->book_phone = $book_phone;
  }
  
  /**
   * @function _getBook_company().
   * @abstract Get book_company.
   *
   * @return book_company.
   */
  function _getBook_company()
  {
      return $this->book_company;
  }
  
  /**
   * @function _setBook_company().
   * @abstract Set book_company.
   *
   * @param book_company the value to set.
   */
  function _setBook_company($book_company = '')
  {
      $this->book_company = $book_company;
  }
  
  /**
   * @function _getBook_message().
   * @abstract Get book_message.
   *
   * @return book_message.
   */
  function _getBook_message()
  {
      return $this->book_message;
  }
  
  /**
   * @function _setBook_message().
   * @abstract Set book_message.
   *
   * @param book_message the value to set.
   */
  function _setBook_message($book_message = '')
  {
      $this->book_message = $book_message;
  }
  
  /**
   * @function _getBook_date().
   * @abstract Get book_date.
   *
   * @return book_date.
   */
  function _getBook_date()
  {
      return $this->book_date;
  }
  
  /**
   * @function _setBook_date().
   * @abstract Set book_date.
   *
   * @param book_date the value to set.
   */
  function _setBook_date($book_date = '')
  {
      $this->book_date = $book_date;
  }
}
