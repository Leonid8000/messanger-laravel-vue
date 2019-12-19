<template>
    <div class="chat-app container-fluid">
        <div class="row">
            <ContactList :contacts="contacts" @selected="startConversationWith" class="col-md-2"/>
            <Conversation :contact="selectedContact" :messages="messages" class="col-md-10"/>
        </div>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactList from './ContactList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },
        mounted() {
//            console.log(this.user);
            axios.get('/contacts')
                    .then((response) => {
//                            console.log(response.data);
                            this.contacts = response.data;
                    });
        },
        methods:{
            startConversationWith(contact) {
                axios.get(`/conversation/${contact.id}`)
                        .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                });
            }
        },
        components: {Conversation, ContactList}
    }
</script>

