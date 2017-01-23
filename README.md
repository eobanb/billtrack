# Billtrack
v0.4

Billtrack is a small web application that consists of:

* A Wordpress plugin (`ipm-billtrack`) that creates a custom hierarchical post type, 'billupdates'
* A pair of Wordpress template files (`page-billtrack.php` and `page-bills.php`), usable with any theme, which outputs the bill updates as a Javascript object and the bills as `<option>` elements for navigational purposes
* A CMS-independent widget (`billtrack-app`) which presents the bill updates as a web interactive, using listjs.

## Getting started

To get started, first install and activate the WP plugin (`ipm-billtrack` / 'BillTrack backend'). On activation, the custom post type 'billupdates' will be generated. If the post type already exists as a flat post type, it will be converted to a hierarchical post type. Start by creating a new bill post with a title, description in the post body, and two custom fields ('bill_number' and 'bill_topic').

Then, create a few child posts of the bill post to create updates, with a title, description, and tags.

Next, add the files `page-billtrack.php` and `page-bills.php` to your WP theme, and create two Pages, one called 'Billtrack' and the other called 'Bills'. Wordpress with automatically use the proper page templates if you use matching `page-*.php` filenames and page names.

Note that by default, the WP loop is limited to 500 bills and 500 updates for performance reasons. I suggest using a caching mechanism in conjunction with Billtrack.

If everything is working correctly so far and you've published at least one billupdate parent post (a bill) and one billupdate child post (a bill update), you should be able to visit yourWPsiteurl.example/billtrack/ and see a snippet of JS (no, this is not where the interactive itself lives), beginning with a global variable called BillUpdateList, a jQuery handler, and an object with the following data fields:

* `id` (the WP post ID; not used)
* `bill` (the WP post title)
* `billnum` (the value of the 'bill_number' meta field)
* `topic` (the tags of the WP post)
* `headline` (the title of the WP post)
* `date` (the WP post date)
* `body` (the WP post body)

You should also be able to go to /bills/ and see a simple list of `<option>` HTML tags to populate the bill select menu.

The last major step is to upload the billtrack-app folder to a web server with PHP. To hook this part up, edit script tag on line 14 to point to your published billtrack WP page's URL. Then, edit the PHP `file_get_contents()` function to point to your bills WP page. Both are commented with 'edit this'.

Finally, you will also want to change the option elements of topics select menu to correspond with what you've filled in the bill_topic meta field of the billupdate parent posts in WP.

## Demo / screenshot

A live demo can be found here:

http://indianapublicmedia.org/static/testing/billtrack/

Here's a screenshot of the web interactive.

![Screenshot of Safari running Billtrack](/billtrack-screenshot.png?raw=true "Screenshot of Billtrack in Safari")

## To do

* rewrite select menu cascade function to not rely on old jquery version for `filter()`
* test as an embedded iframe
* implement pagination if necessary/desirable
* perhaps make bill topics select menu manageable from WP?
* a friendlier tab-based interface to select a bill topic?