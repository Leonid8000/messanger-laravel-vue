<template>
    <div class="contact-list">
        <ul>
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected}">
                <div class="avatar">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
                <hr />
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                selected: 0
            };
        },
        methods: {
            selectContact(index, contact) {
                this.selected = index;

                this.$emit('selected', contact);
            }
        }
    }
</script>

<style>
    .contact-list{
        border: 1px solid #eeeeee;
        overflow-y: auto;
        max-height: 700px;
        background: #FFFFFF;
        box-shadow: inset 13px 24px 35px #34495e;
        margin: 0;
        /*flex: 2;*/
    }
    .contact-list li{
    list-style: none;
    }
    .contact-list img{
        border-radius: 50%;
        width: 100px;
        height:100px;
    }
    .name{
        font-weight: bold;
    }
</style>