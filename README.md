# wpRestApi
# requrie   to set path where  plugin goinig to install  configuration in composer  in wordpress.
# for example I have used bedrock   and it came with this configuration
# "extra": {
#    "installer-paths": 
#      "web/app/plugins/{$name}/": ["type:wordpress-plugin"],
#   },
# To download plugin need run cmd " composer require rohit/inpsyde" this will install  plugin.
# need to activate plugin
# to view output need  to add shortcode "[rest_view]" where ever you want to show output it will render view accordingly
# To run unit test goto plugin folder and run cmd "./vendor/bin/phpunit Test" .This will give  output. 