
<div class="wrap">

    <div id="satollo-header">
        <a href="http://www.satollo.net/plugins/include-it" target="_blank">Get Help</a>
        <a href="http://www.satollo.net/forums" target="_blank">Forum</a>

        <form style="display: inline; margin: 0;" action="http://www.satollo.net/wp-content/plugins/newsletter/do/subscribe.php" method="post" target="_blank">
            Subscribe to satollo.net <input type="email" name="ne" required placeholder="Your email">
            <input type="hidden" name="nr" value="include-it">
            <input type="submit" value="Go">
        </form>

        <a href="https://www.facebook.com/satollo.net" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/facebook.png"></a>

        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8" target="_blank"><img style="vertical-align: bottom" src="http://www.satollo.net/images/donate.png"></a>
        <a href="http://www.satollo.net/donations" target="_blank">Even <b>1$</b> helps: read more</a>
    </div>

    <h2>Include It</h2>

    <p>
        <strong>
            This plugin, even if working, it's a little old. You can use
            <a href="http://www.satollo.net/plugins/include-me" target="_blank">Include Me</a> which is newer, more flexible
            when generating iframe tags and lighter.
        </strong>
    </p>

    <p>The plugin has no options to set, but may be you would have some infos on how to use it. So, read on...</p>

    <p>For any problem or suggestion write me: stefano@satollo.net or visit the site <a href="http://www.satollo.net">www.satollo.net</a></p>

    <h3>How to use</h3>
    <p>The plugin let you to include in a page or in a post whatever file in you web server: text, html or even php (that will be
        executed!).</p>
    <p>To include a file, write down in the post or page this "quick tag":</p>
    <pre>
[include file=filename]
    </pre>
    <p>where the "filename" is a relative path to the file to include. The file system path to your blog "root" is automatically added.</p>

    <p>Example. If you write:</p>
    <pre>
[include file=license.txt]
    </pre>
    <p>the file "license.txt" of the WordPress distribution you are using will be included in the post or page.
    </p>

    <h3>Advanced usage</h3>
    <p>If you need your inclusion to be showed in a iframe, you can! Just add some attributes to the include tag, like in this
        example:</p>
    <pre>
[include file=license.txt iframe=true width=90% height=300 scrolling=no]
    </pre>
    <p>height, width and scrolling are optional. If not set they won't be specified. The iframe "frameborder" will be set to 0 (hidden). If the
        file specified starts with "http://", it will e used "as is" in the "src" attribute of the iframe. If not, the blog home url
        will be added to the file.
    </p>

    <h3>Why to use this plugin?</h3>
    <p>If you want to use the rich text editor (TinyMCE) and you want to put in the post some special code, this way grants the
        code to be inserted without modification. Or if you want to write a service (like a calculator or someting else) written in
        php, you can embed such a service in a normal WordPress page, inheriting graphic, css and the overall blog environement.
    </p>

</div>
