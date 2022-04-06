
/*remove all tags imgs and other trash while pasting*/
add_filter('tiny_mce_before_init', 'customize_tinymce');
 
function customize_tinymce($in) {
  $in['paste_preprocess'] = "function(pl,o){ 
  // remove the following tags completely:
    o.content = o.content.replace(/<\/*(applet|area|article|aside|audio|base|basefont|bdi|bdo|body|button|canvas|command|datalist|details|embed|figcaption|figure|font|footer|frame|frameset|head|header|hgroup|hr|html|iframe|img|keygen|link|map|mark|menu|meta|meter|nav|noframes|noscript|object|optgroup|output|param|progress|rp|rt|ruby|script|section|source|span|style|summary|time|title|track|video|wbr)[^>]*>/gi,'');
	
  // remove all attributes from these tags:
    o.content = o.content.replace(/<(div|table|tbody|tr|td|th|p|b|font|strong|i|em|h1|h2|h3|h4|h5|h6|hr|ul|li|ol|code|blockquote|address|dir|dt|dd|dl|big|cite|del|dfn|ins|kbd|q|samp|small|s|strike|sub|sup|tt|u|var|caption) [^>]*>/gi,'<$1>');
	
  // keep only href in the a tag (needs to be refined to also keep _target and ID):
  // o.content = o.content.replace(/<a [^>]*href=(\"|')(.*?)(\"|')[^>]*>/gi,'<a href=\"$2\">');
  
  // replace br tag with p tag:
    if (o.content.match(/<br[\/\s]*>/gi)) {
      o.content = o.content.replace(/<br[\s\/]*>/gi,'</p><p>');
    }
	
  // replace div tag with p tag:
    o.content = o.content.replace(/<(\/)*div[^>]*>/gi,'<$1p>');
	
  // remove double paragraphs:
    o.content = o.content.replace(/<\/p>[\s\\r\\n]+<\/p>/gi,'</p></p>');
    o.content = o.content.replace(/<\<p>[\s\\r\\n]+<p>/gi,'<p><p>');
    o.content = o.content.replace(/<\/p>[\s\\r\\n]+<\/p>/gi,'</p></p>');
    o.content = o.content.replace(/<\<p>[\s\\r\\n]+<p>/gi,'<p><p>');
    o.content = o.content.replace(/(<\/p>)+/gi,'</p>');
    o.content = o.content.replace(/(<p>)+/gi,'<p>');
  }";
  return $in;
}
