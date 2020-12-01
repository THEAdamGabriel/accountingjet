<?php
/**
 * An example of a project-specific implementation.
 * 
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \DocuSign\eSign\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 * 
 *      new \DocuSign\eSign\Baz\Qux;
 *      
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'DocuSign\\eSign\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

/**
 * User: Naveen Gopala
 * Date: 1/25/16
 * Time: 4:58 PM
 */
require_once __DIR__ . '/test/TestConfig.php';
class UnitTests
{
	/*
	 * Test 0 - login
	 */
	public function testLogin()
	{
	 	$username = 'edward.goodnow@gmail.com';
	 	$password = 'Lestat1226!';
	 	$integratorKey = '4a34aef0-09f9-40ab-bd14-b12d09e34572';
	 	$host = 'https://demo.docusign.net/restapi';

	 	$testConfig = new TestConfig($username, $password, $integratorKey, $host);

	 	$config = new DocuSign\eSign\Configuration();
	 	$config->setHost($testConfig->getHost());
	 	$config->addDefaultHeader("X-DocuSign-Authentication", "{\"Username\":\"" . $testConfig->getUsername() . "\",\"Password\":\"" . $testConfig->getPassword() . "\",\"IntegratorKey\":\"" . $testConfig->getIntegratorKey() . "\"}");

	 	$testConfig->setApiClient(new DocuSign\eSign\ApiClient($config));


	 	$authenticationApi = new DocuSign\eSign\Api\AuthenticationApi($testConfig->getApiClient());

		$options = new \DocuSign\eSign\Api\AuthenticationApi\LoginOptions();

	 	$loginInformation = $authenticationApi->login($options);
	 	if(isset($loginInformation) && count($loginInformation) > 0)
	 	{
	 		$loginAccount = $loginInformation->getLoginAccounts()[0];
	 		if(isset($loginInformation))
	 		{
	 			$accountId = $loginAccount->getAccountId();
	 			if(!empty($accountId))
	 			{
	 				$testConfig->setAccountId($accountId);
	 			}
	 		}
	 	}

	 	return $testConfig;
	}

	function signatureRequestOnDocument($testConfig, $documents, $status = "sent", $embeddedSigning = false)
	{
		

		$envelop_summary = null;

		if(!empty($testConfig->getAccountId()))
		{
			$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());
       
			foreach($documents as $d => $documentin){
       
                    // Add a document to the envelope
                    $document = new DocuSign\eSign\Model\Document();
                    $document->setDocumentBase64(base64_encode($documentin->content));
                    $document->setName($documentin->filename);
                    $document->setDocumentId($d+1);
            }
			// Create a |SignHere| tab somewhere on the document for the recipient to sign
			$signHere = new \DocuSign\eSign\Model\SignHere();
			$signHere->setXPosition("100");
			$signHere->setYPosition("100");
			$signHere->setDocumentId("1");
			$signHere->setPageNumber("1");
			$signHere->setRecipientId("1");

			$tabs = new DocuSign\eSign\Model\Tabs();
			$tabs->setSignHereTabs(array($signHere));

			$signer = new \DocuSign\eSign\Model\Signer();
			$signer->setEmail(DOCUEMAIL);
			$signer->setName(DOCUNAME);
			$signer->setRecipientId("1");
			if($embeddedSigning) {
				$signer->setClientUserId($testConfig->getClientUserId());
			}
			
			$signer->setTabs($tabs);

			// Add a recipient to sign the document
			$recipients = new DocuSign\eSign\Model\Recipients();
			$recipients->setSigners(array($signer));

			$envelop_definition = new DocuSign\eSign\Model\EnvelopeDefinition();
			$envelop_definition->setEmailSubject("[DocuSign PHP SDK] - Please sign this doc");

			// set envelope status to "sent" to immediately send the signature request
			$envelop_definition->setStatus($status);
			$envelop_definition->setRecipients($recipients);
			$envelop_definition->setDocuments(array($document));

			$options = new \DocuSign\eSign\Api\EnvelopesApi\CreateEnvelopeOptions();
			$options->setCdseMode(null);
			$options->setMergeRolesOnDraft(null);

			$envelop_summary = $envelopeApi->createEnvelope($testConfig->getAccountId(), $envelop_definition, $options);
			if(!empty($envelop_summary))
			{
				if($status == "created")
				{
					$testConfig->setCreatedEnvelopeId($envelop_summary->getEnvelopeId());
				}
				else
				{
					$testConfig->setEnvelopeId($envelop_summary->getEnvelopeId());
				}
			}
		}

//		$this->assertNotEmpty($envelop_summary);
		return $testConfig;
	}

	
	/**
     * @depends testLogin
     */
    public function testSignatureRequestOnDocument($testConfig, $embeddedSigning = false)
    {
		return $this->signatureRequestOnDocument($testConfig, "sent", $embeddedSigning);
    }

	/**
	 * @depends testLogin
	 */
	public function testSignatureRequestOnDocumentCreated($testConfig, $embeddedSigning = false)
	{
		return $this->signatureRequestOnDocument($testConfig, "created", $embeddedSigning);
	}

	/**
     * @depends testLogin
     */
	public function testRequestSignatureFromTemplate($testConfig)
    {
		$envelop_summary = null;

		if(!empty($testConfig->getAccountId()))
		{
			$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

			// assign recipient to template role by setting name, email, and role name.  Note that the
		    // template role name must match the placeholder role name saved in your account template.
		    $templateRole = new  DocuSign\eSign\Model\TemplateRole();
		    $templateRole->setEmail($testConfig->getRecipientEmail());
		    $templateRole->setName($testConfig->getRecipientName());
		    $templateRole->setRoleName($testConfig->getTemplateRoleName());

			$envelop_definition = new DocuSign\eSign\Model\EnvelopeDefinition();
			$envelop_definition->setEmailSubject("[DocuSign PHP SDK] - Please sign this template doc");

		    // add the role to the envelope and assign valid templateId from your account
		    $envelop_definition->setTemplateRoles(array($templateRole));
		    $envelop_definition->setTemplateId($testConfig->getTemplateId());

		    // set envelope status to "sent" to immediately send the signature request
		    $envelop_definition->setStatus("sent");

			$options = new \DocuSign\eSign\Api\EnvelopesApi\CreateEnvelopeOptions();
			$options->setCdseMode(null);
			$options->setMergeRolesOnDraft(null);

			$envelop_summary = $envelopeApi->createEnvelope($testConfig->getAccountId(), $envelop_definition, $options);
			if(!empty($envelop_summary))
			{
//				$testConfig->setEnvelopeId($envelop_summary->getEnvelopeId());
			}
		}

		$this->assertNotEmpty($envelop_summary);

		return $testConfig;
	}

	/**
     * @depends testSignatureRequestOnDocument
     */
	public function testGetEnvelopeInformation($testConfig)
    {
		$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$options = new \DocuSign\eSign\Api\EnvelopesApi\GetEnvelopeOptions();
		$options->setInclude(null);

	    $envelope = $envelopeApi->getEnvelope($testConfig->getAccountId(), $testConfig->getEnvelopeId(), $options);
		$this->assertNotEmpty($envelope);

	    return $testConfig;
	}

	/**
     * @depends testSignatureRequestOnDocument
     */
	public function testListRecipients($testConfig)
    {
    	$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());
        $recipients = $envelopeApi->listRecipients($testConfig->getAccountId(), $testConfig->getEnvelopeId());

        $this->assertNotEmpty($recipients);
		$this->assertNotEmpty($recipients->getRecipientCount());

    	return $testConfig;
    }

	/**
	 * @depends testLogin
	 */
	public function testListStatusChanges($testConfig)
	{
	
		date_default_timezone_set('America/Los_Angeles');

		$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$options = new \DocuSign\eSign\Api\EnvelopesApi\ListStatusChangesOptions();
		$options->setInclude(null);
		$options->setPowerformids(null);
		$options->setAcStatus(null);
		$options->setBlock(null);
		$options->setSearchText(null);
		$options->setStartPosition(null);
		$options->setStatus(null);
		$options->setToDate(null);
		$options->setTransactionIds(null);
		$options->setUserFilter(null);
		$options->setFolderTypes(null);
		$options->setUserId(null);
		$options->setCount(10);
		$options->setEmail(null);
		$options->setEnvelopeIds(null);
		$options->setExclude(null);
		$options->setFolderIds(null);
		$options->setFromDate(date("Y-m-d", strtotime("-30 days")));
		$options->setCustomField(null);
		$options->setFromToStatus(null);
		$options->setIntersectingFolderIds(null);
		$options->setOrder(null);
		$options->setOrderBy(null);
		$options->setUserName(null);

		$envelopesInformation = $envelopeApi->listStatusChanges($testConfig->getAccountId(), $options);

		$this->assertNotEmpty($envelopesInformation);

		return $testConfig;
	}

	/**
     * @depends testSignatureRequestOnDocument
     */
    public function testListDocumentsAndDownload($testConfig)
	{
		$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$docsList = $envelopeApi->listDocuments($testConfig->getAccountId(), $testConfig->getEnvelopeId());
		$this->assertNotEmpty($docsList);
		$this->assertNotEmpty($docsList->getEnvelopeId());

		$docCount = count($docsList->getEnvelopeDocuments());
		if (intval($docCount) > 0)
		{
			foreach($docsList->getEnvelopeDocuments() as $document)
			{
				$this->assertNotEmpty($document->getDocumentId());
				//$file = $envelopeApi->getDocument($testConfig->getAccountId(), $testConfig->getEnvelopeId(), $document->getDocumentId());
				//$this->assertNotEmpty($file);
			}
		}

    	return $testConfig;
    }

    /**
     * @depends testSignatureRequestOnDocumentCreated
     */
	public function testCreateEmbeddedSendingView($testConfig)
    {
    	$testConfig = $this->testSignatureRequestOnDocument($testConfig, "created", true);

    	$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$return_url_request = new \DocuSign\eSign\Model\ReturnUrlRequest();
		$return_url_request->setReturnUrl($testConfig->getReturnUrl());
		
		$senderView = $envelopeApi->createSenderView($testConfig->getAccountId(), $testConfig->getCreatedEnvelopeId(), $return_url_request);

		$this->assertNotEmpty($senderView);
		$this->assertNotEmpty($senderView->getUrl());

    	return $testConfig;
    }

    /**
     * @depends testSignatureRequestOnDocument
     */
	public function testCreateEmbeddedSigningView($testConfig)
    {
		$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$recipient_view_request = new \DocuSign\eSign\Model\RecipientViewRequest();
		$recipient_view_request->setReturnUrl($testConfig->getReturnUrl());
		$recipient_view_request->setClientUserId($testConfig->getClientUserId());
		$recipient_view_request->setAuthenticationMethod("email");
		$recipient_view_request->setUserName($testConfig->getRecipientName());
		$recipient_view_request->setEmail($testConfig->getRecipientEmail());

		$signingView = $envelopeApi->createRecipientView($testConfig->getAccountId(), $testConfig->getEnvelopeId(), $recipient_view_request);

		$this->assertNotEmpty($signingView);
		$this->assertNotEmpty($signingView->getUrl());

    	return $testConfig;
    }

    /**
     * @depends testSignatureRequestOnDocument
     */
    public function testCreateEmbeddedConsoleView($testConfig)
    {
		$envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($testConfig->getApiClient());

		$console_view_request = new \DocuSign\eSign\Model\ConsoleViewRequest();
		$console_view_request->setEnvelopeId($testConfig->getEnvelopeId());
		$console_view_request->setReturnUrl($testConfig->getReturnUrl());

		$view_url = $envelopeApi->createConsoleView($testConfig->getAccountId(), $console_view_request);

		$this->assertNotEmpty($view_url);
		$this->assertNotEmpty($view_url->getUrl());

    	return $testConfig;
    }
}
