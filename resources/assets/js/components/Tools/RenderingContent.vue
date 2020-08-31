<template></template>

<script>
export default 
{
    props:['content'],
    data() {
            return {
              ic_text : 'rekes-text',
              ic_html : 'rekes-html',
            };
    },
    mounted() {
        console.log('result content', this.content);
        this.renderText();
    },
    methods:
    {
        renderText()
        {   
            console.log('initial rendering content text');
            let datadb  = this.content;
		    let init_target = $('.' + this.ic_text);
            for( var i = 0; i < datadb.length; i++ )
			{
                if( datadb[i].index == init_target.eq( datadb[i].index ).attr('index') 
                   && datadb[i].class == this.ic_text)
                {
                    console.log( datadb[i].content_text);
				    init_target.eq( datadb[i].index ).text( datadb[i].content_text );
                }
            }
            $('.rekes-text').eq(0).text('masdf');
        },
    }
}
</script>