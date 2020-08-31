<template>
    <div>
        <form  @submit="submit"> 
            <div class="form-group">
                <label for="focusedinput">Page Name</label>
                <input type="text" class="form-control" v-model="model.page_name" id="focusedinput" placeholder="...." >
                <small class="text-danger" v-if="msg_error.page_name">{{ msg_error.page_name[0] }}</small>
            </div>
            <div class="form-group">
                <label for="focusedinput">Page Title</label>
                <input type="text" class="form-control" v-model="model.page_title" id="focusedinput" placeholder="...." >
                <small class="text-danger" v-if="msg_error.page_title">{{ msg_error.page_title[0] }}</small>
            </div>
            <div class="form-group">
                <label for="focusedinput">Meta Keyword</label>
                <input type="text" class="form-control" v-model="model.meta_keyword" id="focusedinput" placeholder="....">
                <small class="text-danger" v-if="msg_error.meta_keyword">{{ msg_error.meta_keyword[0] }}</small>
            </div>
            <div class="form-group">
                <label for="focusedinput">Meta Description</label>
                <small>Maximum of characters 160</small>
                <textarea class="form-control" v-model="model.meta_description" style="height:120px;"></textarea>
                <small class="text-danger" v-if="msg_error.meta_description">{{ msg_error.meta_description[0] }}</small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger-alt" style="width:100%;">Save Configuration</button>
            </div>
        </form>
    </div>
</template> 
<script>

    // import - library
    import axios from 'axios';
  
    export default 
    {
        components: {
        },
        data() {
            return {
              slug : $('meta[name="slug"]').attr('content'),  
              lang : $('meta[name="lang"]').attr('content'),  
              model : [],
              msg_error : {}
            };
        },
        mounted() {
            this.read();
        },
        methods: {
          
            read(){
                axios.post( 'api/page-config/data/'+this.slug+'/'+this.lang, {
                }).then((res) => {
                    // parsing data
                    this.model = res.data;
                });
            },
            submit(e) 
            {
                e.preventDefault();
                axios.post( 'api/page-config/update/'+this.model.id, {
                    page_name: this.model.page_name,
                    page_title: this.model.page_title,
                    meta_keyword: this.model.meta_keyword,
                    meta_description: this.model.meta_description
                })
                .then((response) => {
                    if(response.data.result == 'ok'){
                        this.msg_error = {};
                        alert('Success update config page');
                        window.location.reload();
                    } 
                })
                .catch( (error) => {
                    if( error.response.status == 422 ){
                        this.msg_error = JSON.parse(error.request.responseText);
                    }
                });
            }
        }
    }
</script>
<style>
    .text-danger{
        color:red !important;
    }
</style>