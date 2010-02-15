<?php
/* SVN FILE: $Id$ */
/**
 * JavascriptHelperTest file
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2006-2010, Cake Software Foundation, Inc.
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2006-2010, Cake Software Foundation, Inc.
 * @link          https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package       cake
 * @subpackage    cake.tests.cases.libs.view.helpers
 * @since         CakePHP(tm) v 1.2.0.4206
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
App::import('Core', array('Controller', 'View', 'ClassRegistry', 'View'));
App::import('Helper', array('Javascript', 'Html', 'Form'));
/**
 * TheJsTestController class
 *
 * @package       cake
 * @subpackage    cake.tests.cases.libs.view.helpers
 */
class TheJsTestController extends Controller {
/**
 * name property
 *
 * @var string 'TheTest'
 * @access public
 */
	var $name = 'TheTest';
/**
 * uses property
 *
 * @var mixed null
 * @access public
 */
	var $uses = null;
}
/**
 * TheView class
 *
 * @package       cake
 * @subpackage    cake.tests.cases.libs.view.helpers
 */
class TheView extends View {
/**
 * scripts method
 *
 * @access public
 * @return void
 */
	function scripts() {
		return $this->__scripts;
	}
}
/**
 * TestJavascriptObject class
 *
 * @package       cake
 * @subpackage    cake.tests.cases.libs.view.helpers
 */
class TestJavascriptObject {
/**
 * property1 property
 *
 * @var string 'value1'
 * @access public
 */
	var $property1 = 'value1';
/**
 * property2 property
 *
 * @var int 2
 * @access public
 */
	var $property2 = 2;
}
/**
 * JavascriptTest class
 *
 * @package       test_suite
 * @subpackage    test_suite.cases.libs
 * @since         CakePHP Test Suite v 1.0.0.0
 */
class JavascriptTest extends CakeTestCase {
/**
 * Regexp for CDATA start block
 *
 * @var string
 */
	var $cDataStart = 'preg:/^\/\/<!\[CDATA\[[\n\r]*/';
/**
 * Regexp for CDATA end block
 *
 * @var string
 */
	var $cDataEnd = 'preg:/[^\]]*\]\]\>[\s\r\n]*/';

	/**
	 * Data we will be testing against. Still not 100% on fixtures, sorry.
	 * Real data from app was working on.
	 * Includes some find results, plan some other data we needed for datagrid/pagination.
	 * We then dump it out into a JS var for use on frontend.
	 *
	 * @var string
	 **/
	var $testData = array (
      'model' => 'News',
      'recordsReturned' => 10,
      'totalRecords' => 25,
      'pageSize' => 10,
      'startIndex' => 0,
      'initialPage' => 1,
      'records' =>
      array (
        0 =>
        array (
          'News' =>
          array (
            'id' => '4aff4e2e-f0dc-41f0-8ec4-4ccec0a80134',
            'published' => '1',
            'title' => 'Cinemin Swivel™ Packs Big Screen-Ready Movies in Your Pocket',
            'lead_in' => '<p>
    	iPod&reg;-Compatible Pico Projector Now Available at Brookstone and Amazon.com.</p>
    ',
            'published_date' => '2009-11-16 08:00:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        1 =>
        array (
          'News' =>
          array (
            'id' => '4aff3a5d-ab8c-4f14-b924-4ccec0a80134',
            'published' => '1',
            'title' => 'Seven Days of #Cinemin Twitter Giveaway',
            'lead_in' => '<p>
    Here’s your chance to win this season’s hottest new gadget, the Cinemin Swivel multimedia pico projector.
    </p>',
            'published_date' => '2009-11-14 18:00:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        2 =>
        array (
          'News' =>
          array (
            'id' => '4afd74fd-dc34-4f78-8fa4-4ccbc0a80134',
            'published' => '1',
            'title' => 'Great Deals on WowWee Toys - Now Available at Sears',
            'lead_in' => '<p>
    <a href="http://www.wowwee.com">WowWee</a> toys are now available at selected <a href="http://www.sears.com/">Sears</a> stores, in a dedicated “WowWee Toy Shop” located in the electronics department.

    </p>',
            'published_date' => '2009-11-13 09:37:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        3 =>
        array (
          'News' =>
          array (
            'id' => '4adb9803-4d18-422f-b217-752dc0a8012a',
            'published' => '1',
            'title' => 'Two New Fun-Loving Companions Join the Award-Winning WowWee Robotics™ Line',
            'lead_in' => '<p><a href="http://www.wowwee.com">WowWee</a>, an Optimal Group company (<a href="http://quotes.nasdaq.com/asp/SummaryQuote.asp?symbol=OPMR&selected=OPMR">NASDAQ</a>:OPMR), has announced the retail launch of its newest members of the award-winning Robosapien family: the Roborover and Joebot robots.  The adventurous Roborover robot is a talking, roving explorer with an inquisitive personality and quest to uncover hidden treasure and other imaginary riches.  Roborover’s tread-based caterpillar tracks allow him to conquer all sorts of indoor terrain throughout his adventures and his remote-controlled headlights brighten even the darkest of rooms.  The Joebot robot is not your average Joe – in fact, he’s a walking, talking interactive buddy with a sense of humor, mad dance skills, and the first WowWee robot to feature voice commands.  Tap out a rhythm and Joebot will beatbox it back perfectly while grooving along.</p>',
            'published_date' => '2009-10-15 08:01:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        4 =>
        array (
          'News' =>
          array (
            'id' => '4adb95c1-6098-4559-b0a6-752bc0a8012a',
            'published' => '1',
            'title' => 'WowWee Adds New Features, Upgrades to Rovio Mobile Webcam',
            'lead_in' => '<p><a href="http://www.wowwee.com">WowWee</a>, an Optimal Group company (<a href="http://quotes.nasdaq.com/asp/SummaryQuote.asp?symbol=OPMR&selected=OPMR">NASDAQ</a>:OPMR), has announced a new headlight accessory and several upgrades now available for the Rovio™ mobile webcam, a revolution in home exploration and telepresence.  <a href="http://www.meetrovio.com">Rovio</a>, a wireless Internet-controlled device, streams two-way audio and video via an easy-to-use web browser interface while its users direct it about a home or office environment remotely.  The Rovio headlight, which enhances the ability to explore in dimly lit environments, snaps onto the device and is powered by Rovio’s rechargeable battery pack.  Several software and security updates, including a setup tutorial video series, are also now available just in time for the holiday season, making Rovio and its new retail price of $229 a unique, yet affordable gift choice.</p>',
            'published_date' => '2009-10-13 08:01:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        5 =>
        array (
          'News' =>
          array (
            'id' => '4ac3caba-ffc4-4f09-868e-4591a9baf6a0',
            'published' => '1',
            'title' => 'WowWee Welcomes New Species, Sleeping Cuties, and Minis to the Alive™ Animal Kingdom',
            'lead_in' => '<p><a href="http://www.wowwee.com">WowWee</a>, an Optimal Group company (NASDAQ:OPMR), has announced the retail launch of the new paw-sitively adorable WowWee Alive Baby Animal species, Alive Sleeping Cuties<sup>&#8482;</sup>, and Alive Minis, a huggable and life-like collection of domestic and exotic plush pets that respond to love and attention.  Complete with adoption papers ready for signing, these soft, huggable companions are interactive playmates offering the realistic experience of nurturing a baby animal.</p>',
            'published_date' => '2009-09-30 00:01:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        6 =>
        array (
          'News' =>
          array (
            'id' => '4a255527-2ca4-403a-a9ca-9e9aa9baf6a0',
            'published' => '1',
            'title' => 'Timeless Tale of “Bear Crimbo” Brought to Life by Award-Winning  WowWee Alive™ Technology',
            'lead_in' => '<p>Who fits snuggly into a plaid herringbone sport coat, wears his heart on his sleeve, and is accompanied by his loving friends Rita Robin, Alfie Mouse and Bobby Spider?  Why, the forthcoming children’s book protagonist Bear Crimbo, of course – the star of a classic in the making.  <a href="http://www.wowwee.com">WowWee</a>, an Optimal Group company, today announced its plans to bring Bear Cimbo’s heartwarming tale of friendship and hope to life with their WowWee Alive<sup>&#8482;</sup> technology.  Under its licensing agreement with Bear Crimbo property owner EMGIE, Inc., WowWee intends to make available worldwide its line of plush toys, figures and animatronic playmates from Bear Crimbo’s simple yet magical world.

    </p>',
            'published_date' => '2009-06-02 12:34:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        7 =>
        array (
          'News' =>
          array (
            'id' => '4a245148-a2fc-45c7-97bf-3e09a9baf6a0',
            'published' => '1',
            'title' => 'Thumbs up, Throw Down: Think Wow Toys Poised for World Domination with New Thumb Wrestling Federation Line',
            'lead_in' => '<p>Think Wow Toys, a division of WowWee USA Inc., today announced the lead items in its new Thumb Wrestling Federation: TWF product line, a wacky collection of thumbtastic figures, plastic play sets, and trading cards based on the action-packed show’s zany contestants.  Available this fall, the line will land a piledriver at retail with super soft character thumb-puppets, a wrestling ring with padded thumb holes, and a champion display case sold separately and as deluxe sets.
    </p>',
            'published_date' => '2009-06-01 18:07:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        8 =>
        array (
          'News' =>
          array (
            'id' => '4a24487f-ae60-406f-8d83-38b8a9baf6a0',
            'published' => '1',
            'title' => 'Think Wow Toys Serves up Classic Kids Food Brands with New EZ-2 Make Line',
            'lead_in' => '<p>Think Wow Toys, a division of WowWee Toys USA, today announced the new EZ-2 Make!™ product line, a fun collection of kid-friendly kitchen creations that whip up tasty treats for the whole family in just minutes.  Safe and easy-to-use, the EZ-2 Make! line will feature a stable of classic American brands kids love at a price parents can afford.</p>',
            'published_date' => '2009-06-01 17:28:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
        9 =>
        array (
          'News' =>
          array (
            'id' => '4a0ae747-2fb0-49f8-8cfa-45e1a9baf6a0',
            'published' => '1',
            'title' => 'World’s First Outdoor Projection Art Festival Goes Pico with Cinemin™ Swivel',
            'lead_in' => '<p>This June, digital artists from around the world will project original works onto a town’s iconic white walls at the 2009 Digital Graffiti Festival, the world’s first outdoor projection festival.  The festival, sponsored by the sleek new Cinemin™ Swivel pico projector, provides filmmakers, musicians, and animators with an interactive canvas outside the constructs of boardrooms and movie theaters.  Designed by WowWee Technologies and powered by Texas Instruments’ DLP® Technology, the Cinemin Swivel is one of the latest projection devices enabling artists to cast dynamic images onto urban structures as a means of artistic expression, referred to as “Photon Bombing,” “Guerilla Projection” or “Urban Projection.”  The 2009 Digital Graffiti Festival will take place on June 6, 2009 at the breathtaking resort town Alys Beach, Florida.</p>',
            'published_date' => '2009-05-13 11:27:00',
            'critical' => '0',
            'version_status' => '2',
          ),
          'actions' =>
          array (
            0 => 'view',
            1 => 'edit',
            2 => 'delete',
          ),
        ),
      ),
      'searchTerm' => false,
      'sort' => 'News_published_date',
      'dir' => 'desc',
      'myDataSourceFields' =>
      array (
        0 =>
        array (
          'key' => 'News.id',
        ),
        1 =>
        array (
          'key' => 'News.published',
        ),
        2 =>
        array (
          'key' => 'News.title',
        ),
        3 =>
        array (
          'key' => 'News.lead_in',
        ),
        4 =>
        array (
          'key' => 'News.published_date',
        ),
        5 =>
        array (
          'key' => 'News.critical',
        ),
        6 =>
        array (
          'key' => 'News.version_status',
        ),
        7 =>
        array (
          'key' => 'actions',
        ),
      ),
      'myColumnDefs' =>
      array (
        0 =>
        array (
          'label' => 'Show',
          'width' => 50,
          'key' => 'News_published',
          'field' => 'News.published',
          'sortable' => true,
        ),
        1 =>
        array (
          'label' => 'Version',
          'key' => 'News_version_status',
          'field' => 'News.version_status',
          'sortable' => true,
        ),
        2 =>
        array (
          'label' => 'Title',
          'key' => 'News_title',
          'field' => 'News.title',
          'sortable' => true,
        ),
        3 =>
        array (
          'label' => 'Lead in',
          'key' => 'News_lead_in',
          'field' => 'News.lead_in',
          'sortable' => true,
        ),
        4 =>
        array (
          'label' => 'Date Published',
          'key' => 'News_published_date',
          'field' => 'News.published_date',
          'sortable' => true,
        ),
        5 =>
        array (
          'label' => 'Critical',
          'key' => 'News_critical',
          'field' => 'News.critical',
          'sortable' => true,
        ),
        6 =>
        array (
          'label' => 'Actions',
          'key' => 'actions',
          'field' => 'actions',
          'sortable' => false,
        ),
      ),
      'actionUrlBase' => 'http://localhost/wowwee/en/admin/news/',
      'dataSource' => 'http://localhost/wowwee/en/admin/news/index/',
    );

/**
 * setUp method
 *
 * @access public
 * @return void
 */
	function startTest() {
		$this->Javascript =& new JavascriptHelper();
		$this->Javascript->Html =& new HtmlHelper();
		$this->Javascript->Form =& new FormHelper();
		$this->View =& new TheView(new TheJsTestController());
		ClassRegistry::addObject('view', $this->View);
	}
/**
 * tearDown method
 *
 * @access public
 * @return void
 */
	function endTest() {
		unset($this->Javascript->Html);
		unset($this->Javascript->Form);
		unset($this->Javascript);
		ClassRegistry::removeObject('view');
		unset($this->View);
	}

    /**
     * A test to illustrate bug found in non-native encoder.
     * Unless someone is really excited about writing/debug the cakephp json encoder,
     * I suggest swapping it out for
     * PEARs Services_JSON
     * http://pear.php.net/pepr/pepr-proposal-show.php?id=198
     * for helpers/javascript::object() in the else block line 617
     * Generally, json_encode is available on most modern php,
     * however, those of us who have to use centos version of php 5.1 can get bit by this.
     *
     * @return void
     **/
    function testNonNativeBug() {
        if(!function_exists('json_encode')) {
            $this->assertTrue(false, 'You need json_encode on your system to test this.');
            return false;
        }
        // Working example: assumes you have json_encode on your system.
        $id = 'datatable4b799efe49108';

        $prefix = 'YAHOO.namespace("Plank.bb.datatable").'.$id.' = ';
        $postfix = ' ;';

        $json_encode_out = $this->Javascript->object($this->testData,
            array('block'=>true, 'prefix'=>$prefix, 'postfix'=>$postfix)
        );

        $this->Javascript->useNative = false;

        $json_encode_non_native_out = $this->Javascript->object($this->testData,
            array('block'=>true, 'prefix'=>$prefix, 'postfix'=>$postfix)
        );

        //This should pass, but doesn't using old non-native
        $this->assertEqual($json_encode_out, $json_encode_non_native_out);

    }
}
?>