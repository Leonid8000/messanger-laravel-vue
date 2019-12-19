<template>
    <div class="conversation">
        <div class="card-header">{{ contact ? contact.name : 'Select a Contact'}}</div>
        <MessagesFeed :contact="contact" :messages="messages" />
        <MessageComposer @send="sendMessage" />
    </div>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                console.log(text);
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style>
    .conversation{
        /*flex: 5;*/
        /*background: red;*/
        float: left;
    }
</style>