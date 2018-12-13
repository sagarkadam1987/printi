<?php

namespace test\Bundle\printiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$client = new \Github\Client();
		$repositories = array();
		try{
			$repositories = $client->api('user')->repositories('symfony');
			$strErrMsg = '';
			if(empty($repositories)){
				$strErrMsg = 'No Data found ';		
			}
		}
		catch(\Exception $ex){
			$strErrMsg = $ex->getMessage();		
		}
		return $this->render('testprintiBundle:Default:index.html.twig', array( 'arrRespositories' => $repositories, 'strErrMsg' => $strErrMsg ));
    }
}
