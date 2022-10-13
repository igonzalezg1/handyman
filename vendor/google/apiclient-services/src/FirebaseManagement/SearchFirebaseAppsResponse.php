<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\FirebaseManagement;

class SearchFirebaseAppsResponse extends \Google\Collection
{
  protected $collection_key = 'apps';
  protected $appsType = FirebaseAppInfo::class;
  protected $appsDataType = 'array';
  public $nextPageToken;

  /**
   * @param FirebaseAppInfo[]
   */
  public function setApps($apps)
  {
    $this->apps = $apps;
  }
  /**
   * @return FirebaseAppInfo[]
   */
  public function getApps()
  {
    return $this->apps;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchFirebaseAppsResponse::class, 'Google_Service_FirebaseManagement_SearchFirebaseAppsResponse');
