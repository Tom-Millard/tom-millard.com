---
title: Flexbox vertical align center
tags:
-   css3
-   scss
-   compass
excerpt: With the power of flex-box we can now vertically align in the unknown mixing this in with compass we can apply a style we can then use throughout our project Taking the following HTML as our layout lt DOCTYPE html
---

With the power of flex-box we can now vertically align in the unknown, mixing this in with compass we can apply a style we can then use throughout our project. 

Taking the following HTML as our layout:

```language-html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JS Bin</title>
</head>
<body>
  <div class="container center">
    <div class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac sapien vitae orci vestibulum sollicitudin. Sed in tortor id mi accumsan placerat. Sed eget nulla eu elit porttitor condimentum et eu lacus. Suspendisse potenti. Etiam a ligula sit amet mauris finibus mattis in sed massa. Nulla nec facilisis mi. Proin vehicula laoreet gravida.</p>
    </div>
  </div>
</body>
</html>
```

Then create a simple style using the following mixins:

```language-scss
.center {
	@include display-flex;
	@include align-items(center);
	@include justify-content(center);
}
```

The whole CSS for this project:

```language-scss
@import "compass/css3";
html, body, .container {
  height : 100%;
}
 
.center {
  @include display-flex;
	@include align-items(center);
	@include justify-content(center);
}
 
.content {
  max-width : 50%;
  margin : 0 auto;
}
```

This was built based on version 3 of compass which seem to have better support for flex-box mixins.
