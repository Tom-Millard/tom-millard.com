---

title: Youtube Responsive shiv for CMS Driven Content
tags:
-   javascript
-   youtube
excerpt: Edits have been made to the repo code found here When a user adds a youtube video to the site using a WYSIWYG editor the initial code output will not be responsive unless the user appends the needed element manually

---

**Edits have been made to the repo code found [here](https://github.com/Tom-Millard/responsive-youtube-shiv)**

When a user adds a youtube video to the site using a WYSIWYG editor the initial code output will not be responsive unless the user appends the needed element manually.

This shiv allows the user to copy and paste the video into a WYSIWYG from youtube and forget about all the responsive woes.

```language-css
        .youtube-video {
            max-width: 640px;
        }

        .youtube-video__container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px; height: 0; overflow: hidden;
        }

        .youtube-video__container iframe,
        .youtube-video__container object,
        .youtube-video__container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
```

```language-javascript
	<script>
        //requires jquery
        function youtube(){
            var t = this
            ,   node = $("iframe[src^='https://www.youtube.com']")
            ;

            function init(){
                build();
            }

            function build(){
                for(var x = 0, xl = node.length; x<xl; ++x){
                    var h = template(node[x])
                    ,   i = $(node[x]);
                    i.hide();
                    i.after(h);
                    i.remove();
                }
            }

            function template(iframe){
                var html = '<div class="youtube-video"><div class="youtube-video__container">'+ iframe.outerHTML +'</div></div>';
                return html;
            }
            init();
        }

        new youtube();
	</script>
```

Code on [github](https://github.com/Tom-Millard/responsive-youtube-shiv)
