<?php

namespace MyVenture\Service;

use MyVenture\Contracts\ICommonFacade;



require_once '../Contracts/ICommonFacade.php';
require_once '../Facade/BusinessEngine.php';


/**
 * Short description of class BusinessEngine
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */

class PrimaryServiceEngine implements ICommonFacade
{

    /**
     * Short description of method GetMySubscribedMBlogs()
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  Integer UID
     * @return mixed
     */
    public function GetMySubscribedMBlogs($UID)
    {
    	
      	$businessFacade= new \MyVenture\Facade\ BusinessEngine();
      	
      	return	$businessFacade->GetMySubscribedMBlogs($UID);
      	
    }

    /**
     * Short description of method GetMyFollowers
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  Integer UID
     * @return mixed
     */
    public function GetMyFollowers( Integer $UID)
    {
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000982 begin
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000982 end
    }

    /**
     * Short description of method GetWhoIFollow
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  Integer UID
     * @return mixed
     */
    public function GetWhoIFollow( Integer $UID)
    {
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000985 begin
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000985 end
    }

    /**
     * Short description of method PublishMBlog
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  Integer UID
     * @param  String content
     * @return mixed
     */
    public function PublishMBlog( Integer $UID,  String $content)
    {
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000988 begin
        // section -64--88-52-1--43214224:1325c0244f0:-8000:0000000000000988 end
    }

} /* end of class BusinessEngine */

?>