<template>
     <div style="margin-bottom:100px;">
        <div class="" v-for="(items, i) in model">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                <button  class="btn btn-link" data-toggle="collapse" @click="showFaq(i)" aria-expanded="true" aria-controls="collapse">
                    <div class="circle-icon">
                        <i :id="'icon-' + i" class="ion-ios-arrow-right"></i>
                    </div>
                    <span class="title">{{ items.question }}</span>
                </button>
                </h5>
            </div>
            <div :id="'collapse-' + i" :class=" i == 0 ? 'collapse now' : 'collapse' "  aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    {{ items.answer }}
                </div>
            </div>
        </div>
    </div>
</template> 
<style lang='scss' scoped>
  
    .btn{
      white-space: normal;
      text-align: left;
    }
    .banner{
      width:100%;
      height:auto;
    }
  
    .faq-collapse{
      padding:0px;
      margin:0 auto;
      margin-bottom:70px;
    }
    .con-circle{
      float:left;
      width:30px;
      height:40px;
    }
    .card-header .circle-icon{
      margin-right:15px;
    }
    .card-header .title{
      font-size:14.5px;
      color:#ad8c56;
      font-family: "GothaProLight";
      font-weight: bold;
    }
    div.circle-icon{
      position: relative;
      top:3px;
    }
    .card-body{
      margin-left:23px;
      padding-top:0px;
      font-size:13px;
      font-family: "GothaProLight";
    }
    .btn-link:hover, .btn-link:focus, .btn-link.focus{
      text-decoration:none;
    }
</style>
<script>

    // import - library
    import axios from 'axios';
  
    export default 
    {
        components: {
        },
        data() {
            return {
              slug : $('meta[name="lang"]').attr('content'),  
              model : [],
              msg_error : {}
            };
        },
        mounted() {
            this.read();
        },
        methods: {
            showFaq(idx)
            {
                $('.collapse').slideUp();
                $('#collapse-'+idx).slideDown();
                $('.ion-ios-arrow-down').attr('class', 'ion-ios-arrow-right');
                $('#icon-'+idx).attr('class', 'ion-ios-arrow-down');
            },
            read(){
                axios.post( 'api/page-faq/data/'+this.slug, {
                }).then((res) => {
                    // parsing data
                    this.model = res.data;
                });
            },
           
        }
    }
</script>
