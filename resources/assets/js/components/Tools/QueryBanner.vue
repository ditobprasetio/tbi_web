<template>
    <div class="row">
            <div class="col-md-4">
                <div class="rekes-boxy">
                    <div id="carousel-custom-image"> </div>
                </div>
                <div class='carousel-custom-controls'>
                    <ul>
                        <li><a href="javascript:;" @click="goToImages(0)">1</a></li>
                        <li><a href="javascript:;" @click="goToImages(1)">2</a></li>
                        <li><a href="javascript:;" @click="goToImages(2)">3</a></li>
                        <li><a href="javascript:;" @click="goToImages(3)">4</a></li>
                        <li><a href="javascript:;" @click="goToImages(4)">5</a></li>
                        <li><a href="javascript:;" @click="goToImages(5)">6</a></li>
                    </ul>
                </div>
            </div>

            <!-- album query -->
            <div class="col-md-8"  v-if="active_query == 'album'">
                <div class="rekes-boxy rekes-gallery-list" >
                    <label> Choose Album 2</label>   
                    <div class="row">
                        <div class="col-md-4" v-for="(items, idx) in model">
                            <a href="javascript:;"  @click="switchAlbum(items.id)">
                                <div class="image-thumb">
                                    <img src="/images/folder2.png"  style="width:auto; height:100px;"/>
                                </div>
                                <small>{{ items.name }}</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <hr/>
                    <pagination :meta_data="meta_data" v-on:next="readAlbum"></pagination>
                </div>
            </div>

            <!-- gallery query **-->
            <div class="col-md-8"  v-if="active_query == 'gallery'">
                <div v-if="model.length > 0">
                    <div class="rekes-boxy rekes-gallery-list" >
                        <a href="javascript:;" @click="readAlbum">Album Collection</a>  &rarr; 
                        <label>{{model[0].album_name}}</label> 
                        <div class="row" >
                            <div class="col-md-3" v-for="(items, idx) in model">
                                <a href="javascript:;"  @click="selectImage(items.path)">
                                    <div class="image-thumb">
                                        <img v-bind:src="path_cms + items.path" alt="..." style="height:auto; width:100%;">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <hr/>
                        <pagination :meta_data="meta_data" v-on:next="readGallery"></pagination>
                    </div>
                </div>
                <div class="rekes-boxy rekes-gallery-list" v-if="model.length < 1">
                    <a href="javascript:;" @click="readAlbum">&larr; Back to Album Collection</a> 
                    <div class="row" >
                        <div class="col-md-12">
                            <hr/>
                            <label class="text-danger">No image collection</label>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template> 

<script>
    import axios from 'axios';
    import Pagination from '../Tools/Paginate';

    export default {
        components: {
            Pagination,
        },
        data() {
            return {
                path_cms : process.env.MIX_APP_ASSET_CMS,
                path_app : process.env.MIX_APP_URL,
                active_query : 'album',
                id_album : 0,
                page:1,
                model : [],
                active_initial : 0,

                // pagination and table tools
                meta_search : {field :'', keyword :''},
                meta_field : [
                    {key : 'name', value : 'Nama Album'},
                    {key : 'description', value : 'Deskripsi'},
                    {key : 'created_at', value : 'Created Date'},
                    {key : 'updated_at', value : 'Updated Date'},
                ],
                meta_data: { last_page: null, current_page: 1, prev_page_url: null},
            }
        },
        mounted() {
            this.readAlbum();
        },
        methods:{
            goToImages(initial_id)
            {
                this.active_initial = initial_id;
                $('#carousel-custom-image').find('img').hide();
                $('#carousel-custom-image').find('#caro-'+initial_id).fadeIn('slow');
            },
            switchAlbum(id_album){
                this.id_album = id_album;
                this.readGallery();
            },
            selectImage(img)
            {
                let path_img = this.path_cms + img;
                $('input[name="content_banner['+this.active_initial+']"] ').val(path_img);
                $('#caro-'+this.active_initial).attr('src', path_img);
            },
            readAlbum(page = 1) 
            {
                this.page = page;
                this.active_query = 'album';

                axios.post( 'api/album/all?page='+this.page, {
                    search : this.meta_search
                }).then((res) => {
                    // parsing data
                    this.model = res.data.result;
                    // pagination
                    this.meta_data.last_page = res.data.last_page;
                    this.meta_data.current_page = res.data.current_page;
                    this.meta_data.prev_page_url = res.data.prev_page_url;  
                });
            },

            readGallery(page = 1) 
            {
                this.page = page;
                this.active_query = 'gallery';

                axios.post( 'api/gallery/data?page='+this.page, {
                    search : this.meta_search,
                    id_album : this.id_album,
                    type : 'image'
                }).then((res) => {
                    // parsing data
                    this.model = res.data.data;
                    // pagination
                    this.meta_data.last_page = res.data.last_page;
                    this.meta_data.current_page = res.data.current_page;
                    this.meta_data.prev_page_url = res.data.prev_page_url;  
                });
            },
        }
    }
</script>

<style lang='scss' scoped>

    .rekes-boxy{
        width:100%;
        height:165px;
        overflow:hidden;
        label{
            font-size:13px; 
            color:gray;
        }
    }

    .rekes-gallery-list
    {
        label{
            margin-bottom:15px;
        }
        a{
            text-decoration:none;
            color:#000;
            font-size:13px;
            small{
                font-size:12px;
            }
        }
        .image-thumb{
            overflow:hidden;
            text-align:center;
            cursor:pointer;
            background-color:whitesmoke;
            padding:2px;
            border-radius:3px;
            -moz-border-radius:3px;
            -webkit-border-radius:3px;
            max-height:160px;
            .fa{
                position:absolute;
                z-index:99;
                right:10px;
                top:10px;
            }
        }
       
    }

   
    .carousel-custom-controls{
        width:120px;
        margin:0 auto;
        ul{
            padding:0;
            margin:0px;
            margin-top:15px;
            text-align:center;
            li{
                float:left;
                margin:1px;
                list-style:none;
                a{
                    color:gray;
                    padding:3px;
                    border:1px solid #a57d1e;
                    text-align:center;
                }

            }
        }
    }

    #carousel-custom-image{
       text-align:center;
    }

  
    
</style>

