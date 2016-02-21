# PHP-SimpleTranslate
A minimal way to translate webpages using php and xml files

##How To Use
Just include in your php file that needs translation.
Use `tr('String')` in your php to translate whatever you need.

To change language simply add links to `?lang='new-language'` where new language is a language code and name of your xmls in your translation folder.

##XML Structure
In the translations folder there are a couple xml files as an example.
Each `<phrase>` has a `<name>`, which is the phrase that it can translate and a `<value>`, which is the translated text.

##To Do
There is a plan to add a way to catch a phrase not translated in the xml (line 51).

###Warning
This script uses $_SESSION variables, but does not check whether it has been initialized or not, mostly because there are many cases in which you may want to manage the session before hand.
