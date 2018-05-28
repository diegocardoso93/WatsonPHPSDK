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

namespace WatsonSDK\Services\Discovery;

/**
 * Discovery query model
 */
class DiscoveryQueryCollectionModel {

    /**
     * @name(environment_id)
     * 
     * The ID of the environment.
     * 
     * @var string
     */
    protected $_environment_id;

    /**
     * @name(collection_id)
     * 
     * The ID of the collection.
     * 
     * @var string
     */
    protected $_collection_id;

    /**
     * @name(filter)
     * 
     * A cacheable query that limits the documents returned to exclude any documents that don't mention the query content. Filter searches are better for metadata type searches and when you are trying to get a sense of concepts in the data set.
     * 
     * @var string
     */
    protected $_filter;

    /**
     * @name(query)
     * 
     * A query search returns all documents in your data set with full enrichments and full text, but with the most relevant documents listed first. Use a query search when you want to find the most relevant search results. You cannot use `natural_language_query` and `query` at the same time.
     *
     * @var string
     */
    protected $_query;

    /**
     * @name(natural_language_query)
     * 
     * A natural language query that returns relevant documents by utilizing training data and natural language understanding. You cannot use `natural_language_query` and `query` at the same time.
     *
     * @var string
     */
    protected $_natural_language_query;

    /**
     * @array(passages)
     * 
     * A passages query that returns the most relevant passages from the results.
     *
     * @var boolean
     */
    protected $_passages;
    
    /**
     * @array(aggregation)
     *
     * An aggregation search uses combinations of filters and query search to return an exact answer. Aggregations are useful for building applications, because you can use them to build lists, tables, and time series. For a full list of possible aggregrations, see the Query reference.
     *
     * @var string
     */
    protected $_aggregation;
    
    /**
     * @array(count)
     *
     * Number of documents to return.
     *
     * @var string
     */
    protected $_count;
    
    /**
     * @array(return_fields)
     *
     * A comma separated list of the portion of the document hierarchy to return.
     *
     * @var array<string>
     */
    protected $_return_fields;
    
    /**
     * @array(offset)
     *
     * The number of query results to skip at the beginning. For example, if the total number of results that are returned is 10, and the offset is 8, it returns the last two results.
     *
     * @var array<string>
     */
    protected $_offset;
    
    /**
     * @array(sort)
     *
     * A comma separated list of fields in the document to sort on. You can optionally specify a sort direction by prefixing the field with `-` for descending or `+` for ascending. Ascending is the default sort direction if no prefix is specified. 
     *
     * @var array[string]
     */
    protected $_sort;
    
    /**
     * @array(highlight)
     *
     * When true a highlight field is returned for each result which contains the fields that match the query with `<em></em>` tags around the matching query terms. Defaults to false. 
     *
     * @var boolean
     */
    protected $_highlight;
    
    /**
     * @array(passages_fields)
     *
     * A comma-separated list of fields that passages are drawn from. If this parameter not specified, then all top-level fields are included.
     *
     * @var array[string]
     */
    protected $_passages_fields;
    
    /**
     * @array(passages_count)
     *
     * The maximum number of passages to return. The search returns fewer passages if the requested total is not found. The default is `10`. The maximum is `100`.
     *
     * @var string
     */
    protected $_passages_count;
    
    /**
     * @array(passages_characters)
     *
     * The approximate number of characters that any one passage will have. The default is `400`. The minimum is `50`. The maximum is `2000`.
     *
     * @var boolean
     */
    protected $_passages_characters;
    
    /**
     * @array(deduplicate)
     *
     * When `true` and used with a Watson Discovery News collection, duplicate results (based on the contents of the `title` field) are removed. Duplicate comparison is limited to the current query only, `offset` is not considered. Defaults to `false`. This parameter is currently Beta functionality.
     *
     * @var boolean
     */
    protected $_deduplicate;
    
    /**
     * @array(deduplicate_field)
     *
     * When specified, duplicate results based on the field specified are removed from the returned results. Duplicate comparison is limited to the current query only, `offset` is not considered. This parameter is currently Beta functionality. 
     *
     * @var string
     */
    protected $_deduplicate_field;
    /**
     * @array(similar)
     *
     * When `true`, results are returned based on their similarity to the document IDs specified in the `similar.document_ids` parameter. The default is `false`.
     *
     * @var string
     */
    protected $_similar;
    /**
     * @array(similar_document_ids)
     *
     * A comma-separated list of document IDs that will be used to find similar documents.   **Note:** If the `natural_language_query` parameter is also specified, it will be used to expand the scope of the document similarity search to include the natural language query. Other query parameters, such as `filter` and `query` are subsequently applied and reduce the query scope.
     *
     * @var string
     */
    protected $_similar_document_ids;
    /**
     * @array(similar_fields)
     *
     * A comma-separated list of field names that will be used as a basis for comparison to identify similar documents. If not specified, the entire document is used for comparison. 
     *
     * @var string
     */
    protected $_similar_fields;
    

    /**
     * Constructor.
     *
     * @param string $environment_id
     * @param string $collection_id
     * @param string $filter
     * @param string $query
     * @param string $natural_language_query
     * @param boolean $passages
     * @param string $aggregation
     * @param string $count
     * @param array<string> $return_fields
     * @param string $offset
     * @param array<string> $sort
     * @param boolean $highlight
     * @param array<string> $passages_fields
     * @param string $passages_count
     * @param string $passages_characters
     * @param boolean $deduplicate
     * @param string $deduplicate_field
     * @param boolean $similar
     * @param array<string> $similar_document_ids
     * @param array<string> $similar_fields
     */
    function __construct($environment_id, $collection_id, $filter = NULL, $query = NULL,
    $natural_language_query = NULL, $passages = NULL, $aggregation = NULL, $count = NULL,
    $return_fields = NULL, $offset = NULL, $sort = NULL, $highlight = NULL, $passages_fields = NULL,
    $passages_count = NULL, $passages_characters = NULL, $deduplicate = NULL,
    $deduplicate_field = NULL, $similar = NULL, $similar_document_ids = NULL, $similar_fields = NULL) {

        $this->setEnvironmentId($environment_id);
        $this->setCollectionId($collection_id);
        $this->setFilter($filter);
        $this->setQuery($query);
        $this->setNaturalLanguageQuery($natural_language_query);
        $this->setPassages($passages);
        $this->setAggregation($aggregation);
        $this->setCount($count);
        $this->setReturnFields($return_fields);
        $this->setOffset($offset);
        $this->setSort($sort);
        $this->setHighlight($highlight);
        $this->setPassagesFields($passages_fields);
        $this->setPassagesCount($passages_count);
        $this->setPassagesCharacters($passages_characters);
        $this->setDeduplicate($deduplicate);
        $this->setDeduplicateField($deduplicate_field);
        $this->setSimilar($similar);
        $this->setSimilarDocumentIds($similar_document_ids);
        $this->setSimilarFields($similar_fields);
    }

    /**
     * Get environment id
     * 
     * @return string
     */
    public function getEnvironmentId() {
        return $this->_environment_id;
    }

    /**
     * Set environment id
     * 
     * @param $val string
     */
    public function setEnvironmentId($val) {
        $this->_environment_id = $val;
    }

    /**
     * Get collection id
     * 
     * @return string
     */
    public function getCollectionId() {
        return $this->_collection_id;
    }

    public function setFilter($val) {
        $this->_filter = $val;
    }
    
    public function setQuery($val) {
        $this->_query = $val;
    }
    
    public function setNaturalLanguageQuery($val) {
        $this->_natural_language_query = $val;
    }
    
    public function setPassages($val) {
        $this->_passages = $val;
    }
    
    public function setAggregation($val) {
        $this->_aggregation = $val;
    }
    
    public function setCount($val) {
        $this->_count = $val;
    }
    
    public function setReturnFields($val) {
        $this->_return_fields = $val;
    }
    
    public function setOffset($val) {
        $this->_offset = $val;
    }
    
    public function setSort($val) {
        $this->_sort = $val;
    }
    
    public function setHighlight($val) {
        $this->_highlight = $val;
    }
    
    public function setPassagesFields($val) {
        $this->_passages_fields = $val;
    }
    
    public function setPassagesCount($val) {
        $this->_passages_count = $val;
    }
    
    public function setPassagesCharacters($val) {
        $this->_passages_characters = $val;
    }
    
    public function setDeduplicate($val) {
        $this->_deduplicate = $val;
    }
    
    public function setDeduplicateField($val) {
        $this->_deduplicate_field = $val;
    }
    
    public function setSimilar($val) {
        $this->_similar = $val;
    }
    
    public function setSimilarDocumentIds($val) {
        $this->_similar_document_ids = $val;
    }
    
    public function setSimilarFields($val) {
        $this->_similar_fields = $val;
    }
    
    /**
     * Set collection id
     * 
     * @param $val string
     */
    public function setCollectionId($val) {
        $this->_collection_id = $val;
    }

    public function getAttributesIterator() {
        foreach ($this as $key => $value) {
            yield [$key => $value];
        }
    }
}