# PHP-SimpleTranslate
A minimal way to translate webpages using php and xml files

## How To Use
Just include `translate.php` in your php file that needs translation.
Use `tr('String')` in your php to translate the phrase you need.

Being in php you can use this to translate anything before sending it to your viewer, meaning you can translate not only text in the body of your page, but also in forms and meta tags, like title and description.

To change language simply add links to `?lang='new-language'` where `new-language` is a language code and the name of your xmls in your translation folder.

The script is written with english `en` as the default language. 

### XML Structure
In the translations folder there are a couple xml files as an example.
Each `<phrase>` has a `<name>`, which is the phrase that it can translate and a `<value>`, which is the translated text.

### To Do
There is a plan to add a way to catch a phrase not translated in the xml (line 51). Currently it simply adds an underscore `_` before and after the string to let you know it has no translation. 
Feel free to change it to your needs!

#### Warning
This script uses $_SESSION variables, but does not check whether it has been initialized or not, mostly because there are many cases in which you may want to manage the session before hand. If you don't, you may want to add the following on the very top of your php file:

>if(!isset($_SESSION)) 
>{ 
>	session_start();
>}
