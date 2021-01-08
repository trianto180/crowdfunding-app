<template>
    <div>
        <v-container class="ma-0 pa-0" grid-list-sm>
            <v-subheader>
                All blog
            </v-subheader>
            <v-layout wrap>
                <v-flex v-for="(blog) in blogs" :key="`blog-`+blog.id" xs6>
                <blog-item :blog="blog" />
                </v-flex>
            </v-layout>
            <v-pagination v-model="page" @input="go" :length="lengthPage" :total-visible="2">
            </v-pagination>
        </v-container>
    </div>
</template>
<script>
import BlogItem from '../components/BlogItem.vue'
export default {
  components: { BlogItem },
    data: () => ({
        blogs: [],
        page : 0,
        lengthPage : 0
    }),
    created(){
        this.go()
    },
    methods : {
        go(){
            let url = 'api/blog?page=' + this.page
            axios.get(url)
            .then((response) => {
                let { data } = response.data
                this.blogs = data.blogs.data
                this.page = data.blogs.current_page
                this.lengthPage = data.blogs.last_page
            })
            .catch((error) => {
                let {responses} = error
                console.log(responses)
            })
        }
    }
}
</script>