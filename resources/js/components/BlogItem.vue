<template>
    <div>
        <v-card :to="'/blog/'+ blog.id">
            <v-img :src="blog.image" class="white--text" height="200px">
                <v-card-title class="fill-height align-end" v-text="blog.title"></v-card-title>
            </v-img>

            <v-card-actions>
                <v-progress-linear v-model="progress" color="blue-grey" height="7"></v-progress-linear>
            </v-card-actions>

            <v-card-actions>
                <v-icon>mdi-cash</v-icon>
                <span> Rp {{ blog.required.toLocaleString('id-ID') }} </span>
                <v-spacer></v-spacer>
                <span> {{ progress }}%</span>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script>
export default {
    name: 'blog-item',
    props: ['blog'],
    computed: {
        progress () {
            return (this.blog.collected / this.blog.required * 100)
        },
    }
}
</script>