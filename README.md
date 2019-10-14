Instagram Feed
======================
This [bolt.cm](https://bolt.cm/) extension allows you to get raw feed data from the Instagram's public API, using the access token of your account. (you can get the access token from [here](https://instagram.pixelunion.net/)).

### Features:
* Configurable parameters: Allow to use the same parameters available in the [Instagram API](https://www.instagram.com/developer/endpoints/users/):
    * COUNT		Count of media to return.
    * MAX_ID	Return media earlier than this max_id.
    * MIN_ID	Return media later than this min_id.
* Cache of API queries: To avoid exceeding the limit of queries, the extension has the option to cache queries made to the API for a configurable time.

### Installation
1. Login to your Bolt installation
2. Go to "Extend" or "Extras > Extend"
3. Type `instagram Feed` into the input field
4. Click on the extension name
5. Click on "Browse Versions"
6. Click on "Install This Version" on the latest stable version

### Requirements
- PHP 7+
- Bolt 3+

### Configuration
You must add the following information in the instagramfeed.emiliomunoz.yml configuration file located in the config/ extensions/ folder.
```
access_token: YOUR_USER_ACCESS_TOKEN
cache_enabled: true # If true, the extension will save the queries in cache
cache_ttl: 3600 # Time the query will remain in cache
```

### Example
```
{% for post in instagram_feed({"count": 9}) %}
  {{ dump(post) }}
{% endfor%}
```

### Notes
The Instagram api will be deprecated in early 2020, so this version of this extension will work until that moment. Soon I will add support for the new Instagram Graph API.

### Contributing
I'm open to suggestions and PRs are always welcome.
