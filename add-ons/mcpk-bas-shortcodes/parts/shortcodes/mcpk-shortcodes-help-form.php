<?php
/*
Name: Shortcode Help
Description: Provides information about entering shortcodes
Shortcode: mcpk-shortcode-help
Icon: dashicons-editor-help
*/
?>

<h3>Basic Shortcodes</h3>

<p><strong>Insert a linked button</strong><br>
<code>[mcw-button title="Click Here" link="http://google.com/"]</code><br>
You may also add a class parameter. The default class is "btn btn-primary." If you're not sure about the class, just leave it out.</p>

<h3>Shortcodes for Coloma/TAR Content</h3>

<p><strong>Insert a row of banner ads</strong><br>
<code>[banner-ads]</code></p>

<p><strong>Insert a single directory category</strong><br>
You have 3 choices: </p>
<ul>
<li><code>[dir_list cat="lodging"]</code> - include category with slug "lodging", with no headline</li>
<li><code>[dir_list cat="lodging" head="true"]</code> - include category with slug "lodging", with the category name as the headline</li>
<li><code>[dir_list cat="lodging" head="Local Accommodations"]</code> - include category with slug "lodging", with the specified headline</li>
</ul>

<p><strong>Insert all directory categories, with jumplinks at the top and the category name as headline for each category</strong><br>
<code>[dir_list cat="*"]</code></p>

<h3>Shortcodes for Panels</h3>

<p><strong>Insert a panel of feature circles</strong><br>
<code>[panel-circles]</code><br>Configure the circle features in the box below that says "Panels - Circles." If you don't see a box like that, make sure the Template (in the right column under Page Attributes) is set to "Panels Page."</p>

<p><strong>Insert a panel of feature boxes</strong><br>
<code>[panel-flips]</code><br>Configure the features in the box below that says "Panels - Flips." If you don't see a box like that, make sure the Template (in the right column under Page Attributes) is set to "Panels Page."</p>

<p><strong>Insert a panel with two columns</strong><br>
For this you need three shortcodes:</p>
<ul>
<li><code>[panel-cols2-start]</code> - insert before the left (first) column of the panel</li>
<li><code>[panel-cols2-break]</code> - insert between the left and right columns</li>
<li><code>[panel-cols2-end]</code> - insert after the right column</li>
</ul>
<p>Example:</p>
<pre>
[panel-cols2-start]
This is the text for the left column.
[panel-cols2-break]
This is the text for the right column.
[panel-cols2-end]
</pre>

<h3>Other Shortcodes</h3>

There are also shortcodes for calendar events and for photographers. Contact Donna if you want more information about them. 