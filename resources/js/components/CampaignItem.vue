<template>
    <div>
        <v-card :to="'/campaign/'+ campaign.id">
            <v-img :src="campaign.image" class="white--text" height="200px">
                <v-card-title class="fill-height align-end" v-text="campaign.title"></v-card-title>
            </v-img>

            <v-card-actions>
                <v-progress-linear v-model="progress" color="info" height="7"></v-progress-linear>
            </v-card-actions>

            <v-card-actions>
                <v-icon>mdi-cash</v-icon>
                <span> Rp {{ campaign.required.toLocaleString('id-ID') }} </span>
                <v-spacer></v-spacer>
                <v-progress-circular
                v-model="progress"
                :size="40"
                color="info"
                >
                {{ progress }}%
                </v-progress-circular>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script>
export default {
    name: 'campaign-item',
    props: ['campaign'],
    computed: {
        progress () {
            return (this.campaign.collected / this.campaign.required * 100)
        },
    }
}
</script>