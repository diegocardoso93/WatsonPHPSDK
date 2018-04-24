<?php
/**
 * Copyright 2017 IBM Corp. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace WatsonSDK\Tests;

use WatsonSDK\Common\HttpClient;
use WatsonSDK\Common\HttpClientConfiguration;
use WatsonSDK\Common\HttpClientException;
use WatsonSDK\Common\SimpleTokenProvider;
use WatsonSDK\Common\SimpleTokenHelper;
use WatsonSDK\Common\WatsonCredential;
use WatsonSDK\Common\InvalidParameterException;

use WatsonSDK\Services\Assistant;
use WatsonSDK\Services\Assistant\InputDataModel;
use WatsonSDK\Services\Assistant\MessageRequestModel;
use WatsonSDK\Services\Assistant\ContextModel;
use WatsonSDK\Services\Assistant\EntityModel;
use WatsonSDK\Services\Assistant\IntentModel;
use WatsonSDK\Services\Assistant\OutputDataModel;
use WatsonSDK\Services\Assistant\SystemResponseModel;
use WatsonSDK\Services\Assistant\DialogModel;
use WatsonSDK\Services\Assistant\WorkspaceRequestModel;

final class AssistantTest extends BaseTestCase {

    /**
     * Assistant unit test with model using basic authentication
     */
    public function testAssistantWithModel () {

        $username = getenv('ASSISTANT_USERNAME');
        $password = getenv('ASSISTANT_PASSWORD');
        $workspace_id = getenv('ASSISTANT_WORKSPACE_ID');

        $assistant = new Assistant( WatsonCredential::initWithCredentials($username, $password) );

        $this->assertInstanceOf(
            Assistant::class, 
            $assistant
        );

        if(isset($username) && isset($password) && isset($workspace_id)) {
            $greetings = $assistant->sendMessage( '', $workspace_id );
            $this->assertEquals(200, $greetings->getStatusCode());

            $result = $greetings->getContent(TRUE);
            $context = $result['context'];
            $system = $context['system'];

            $dialogModel = new DialogModel( $system['dialog_stack'][0]['dialog_node'] );

            $systemModel = new SystemResponseModel( $dialogModel, $system['dialog_turn_counter'], $system['dialog_request_counter'] );

            $contextModel = new ContextModel( $context['assistant_id'], $systemModel );

            $model = new MessageRequestModel( 'What is IBM?', NULL, $contextModel);

            $this->assertNull($model->getEntities());
            $this->assertNull($model->getIntents());
            $this->assertNull($model->getOutput());

            $answer = $assistant->sendMessage( $model, $workspace_id );
            $this->assertEquals(200, $answer->getStatusCode());

        }
    }

    /**
     * Assistant unit test with model using basic authentication
     */
    public function testListWorkspaces () {

        $username = getenv('ASSISTANT_USERNAME');
        $password = getenv('ASSISTANT_PASSWORD');

        if(isset($username) && isset($password)) {
            $assistant = new Assistant( WatsonCredential::initWithCredentials($username, $password) );

            $result = $assistant->listWorkspaces(5, TRUE, Assistant::SORT_BY_NAME_DESC);

            $this->assertEquals(200, $result->getStatusCode());
        }

    }

    /**
     * Assistant unit test with model using basic authentication
     */
    public function testCreateWorkspace () {
        
        $username = getenv('ASSISTANT_USERNAME');
        $password = getenv('ASSISTANT_PASSWORD');
        
        if(isset($username) && isset($password)) {
            $assistant = new Assistant( WatsonCredential::initWithCredentials($username, $password) );
            
            $result = $assistant->createWorkspace(new WorkspaceRequestModel('SuperTeste', 'Workspace com propósito de testes', 'pt-br'));
            
            $this->assertEquals(201, $result->getStatusCode());
        }
        
    }

    /**
     * Assistant unit test for raising InvalidParameterException
     */
    public function testAssistantInvalidParameterException () {

        $this->expectException(InvalidParameterException::class);

        $assistant = new Assistant( WatsonCredential::initWithCredentials('invalid-username', 'invalid-password') );

        $result = $assistant->sendMessage( 0, 'invalid-workspace-id' );
        $this->assertEquals(200, $result->getStatusCode());
    }

}