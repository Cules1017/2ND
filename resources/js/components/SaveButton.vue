<template>
    <div>
        <!-- <button class="contain__title-fixuser" @click="followUser" v-text="buttonText"></button> -->
        <button class="contain__title-follow" @click="savePost" v-text="buttonText">  </button>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'saves'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.saves,
            }
        },
        methods: {
            savePost() {
                axios.post('/save_post/' + this.postId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'Đã lưu' : 'Lưu';
            }
        }
    }
</script>