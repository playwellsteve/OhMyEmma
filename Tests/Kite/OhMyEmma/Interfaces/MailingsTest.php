<?php
namespace Kite\OhMyEmma\Interfaces;

use mocks\RequestMock as RequestMock;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-24 at 21:30:23.
 */
class MailingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Mailings
     */
    protected $mailings;
    protected $request;

    /**
     * Sets up the fixture, for example, opens a network connection.
     */
    protected function setUp()
    {
        $this->request = new RequestMock();
        $this->assertEquals('', $this->request->baseURL);

        $this->mailings = new Mailings($this->request);
        $this->assertObjectHasAttribute('_request', $this->mailings);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::getMailings
     */
    public function testGetMailings()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        // Testing get all mailings 
        $this->assertEquals(
            '/mailings', 
            $this->mailings->getMailings()
        );
        // Testing getting mailings by id 
        $this->assertEquals(
            '/mailings/mailId', 
            $this->mailings->getMailings('mailId')
        );
        // Testing getting mailings by id with member list
        $this->assertEquals(
            '/mailings/mailId/members', 
            $this->mailings->getMailings('mailId', true)
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::getMemberContent
     */
    public function testGetMemberContent()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        // Testing get all mailings 
        $this->assertEquals(
            '/mailings/mailingId/messages/memberId', 
            $this->mailings->getMemberContent('mailingId', 'memberId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::getMailingSubsection
     */
    public function testGetMailingSubsection()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        // Testing get subsection groups 
        $this->assertEquals(
            '/mailings/mailingId/groups',
            $this->mailings->getMailingSubsection('mailingId', 'groups')
        );
        // Testing get subsection searches 
        $this->assertEquals(
            '/mailings/mailingId/searches',
            $this->mailings->getMailingSubsection('mailingId', 'searches')
        );
        // Testing get subsection headsup 
        $this->assertEquals(
            '/mailings/mailingId/headsup',
            $this->mailings->getMailingSubsection('mailingId', 'headsup')
        );
        // Testing get subsection members 
        $this->assertEquals(
            '/mailings/mailingId/members',
            $this->mailings->getMailingSubsection('mailingId', 'members')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::changeStatus
     */
    public function testChangeStatus()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $statusData = array(
            "status" => "e"
        );
        $this->assertEquals(
            '/mailings/mailingId?status=e',
            $this->mailings->changeStatus('mailingId', $statusData)
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::removeMailing
     */
    public function testRemoveMailing()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $this->assertEquals(
            '/mailings/mailingId',
            $this->mailings->removeMailing('mailingId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::cancelMailing
     */
    public function testCancelMailing()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $this->assertEquals(
            '/mailings/cancel/mailingId',
            $this->mailings->cancelMailing('mailingId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::forwardToRecipients
     */
    public function testForwardToRecipients()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $recipientsData = array(
            "recipients" => "object"
        );
        // Testing forwarding to a group 
        $this->assertEquals(
            '/mailings/mailingId?recipients=object',
            $this->mailings->forwardToRecipients('mailingId', $recipientsData)
        );
        // Testing forwarding to an individual 
        $this->assertEquals(
            '/forwards/mailingId/memberId?recipients=object',
            $this->mailings->forwardToRecipients('mailingId', $recipientsData, 'memberId')
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::validateMailingContents
     */
    public function testValidateMailingContents()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $contentsData = array(
            "contents" => "html"
        );
        $this->assertEquals(
            '/mailings/validate?contents=html',
            $this->mailings->validateMailingContents($contentsData)
        );
    }

    /**
     * @covers Kite\OhMyEmma\Interfaces\Mailings::declareSplitTestWinner
     */
    public function testDeclareSplitTestWinner()
    {
        $this->request = new RequestMock();
        $this->mailings = new Mailings($this->request);

        $this->assertEquals(
            '/mailings/mailingId/winner/winnerId',
            $this->mailings->declareSplitTestWinner('mailingId', 'winnerId')
        );
    }
}
