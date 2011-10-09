<?php

namespace MyVenture\Contracts;

interface ICommonFacade
{

	/**
	 * Short description of method GetMySubscribedMBlogs()
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @param  Integer UID
	 * @return mixed
	 */
	public function GetMySubscribedMBlogs($UID,$LastblogTime);
	
	

	/**
	 * Short description of method GetMyFollowers
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @param  Integer UID
	 * @return mixed
	 */
	public function GetMyFollowers($UID);
	

	/**
	 * Short description of method GetWhoIFollow
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @param  Integer UID
	 * @return mixed
	 */
	public function GetWhoIFollow($UID);
	
	/**
	 * Short description of method PublishMBlog
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @param  Integer UID
	 * @param  String content
	 * @return mixed
	 */
	public function PublishMBlog($UID,$content);
	
}