# Billtrack
v0.4

Billtrack is a small web application that consists of:

1. A Wordpress plugin (ipm-billtrack) that creates a custom hierarchical post type, 'billupdates'
2. A Wordpress template file (page-billtrack.php), usable with any theme, which outputs the bill updates as a Javascript object
3. A CMS-independent widget (billtrack-app) which presents the bill updates as a web interactive.

## Getting started

To get started, first install and activate the WP plugin (ipm-billtrack / 'BillTrack backend'). On activation, the custom post type 'billupdates' will be generated. Start by creating a new bill post with a title, description in the post body, and two custom fields ('bill_number' and 'bill_topic'). Then, create a few child posts of the bill post to create updates, with a title, description, and tags.

Next, add the file page-billtrack.php to your WP theme, and create a Page called 'Billtrack'.

If everything is working correctly so far, you should be able to visit yoursiteurl.example/billtrack/ and get a snippet of JS, beginning with a global variable called BillUpdateList, a jQuery init function, and an object with the following data fields:

* id (the WP post ID; not used)
* bill (the WP post title)
* billnum (the value of the 'bill_number' meta field)
* topic (the tags of the WP post)
* headline (the title of the WP post)
* date (the WP post date)
* body (the WP post body)

Finally, upload the billtrack-app folder to a web server with PHP. To hook this part up, edit script tag on line 14 to point to your published billtrack WP page with the JS snippet.

A live demo can be found here:

http://indianapublicmedia.org/static/testing/billtrack/