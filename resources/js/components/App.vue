<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-4" id="app">
                <form @submit.prevent="onSubmit()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            @blur="$v.name.$touch()"
                            :class="{'is-invalid':$v.name.$error}"
                            type="text" v-model="name" class="form-control" id="name">
                        <div class="invalid-feedback" v-if="!$v.name.required">Name is required</div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input
                            @blur="$v.phone.$touch()"
                            :class="{'is-invalid':$v.phone.$error}"
                            v-model="phone"
                            type="text" class="form-control" id="phone">
                        <div class="invalid-feedback" v-if="!$v.phone.required">Phone is required</div>
                        <div class="invalid-feedback" v-if="!$v.phone.numeric">The value should be a number</div>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select
                            @change="$v.type.$touch()"
                            :class="{'is-invalid':$v.type.$error}"
                            v-model="type"
                            class="form-control" id="type" name="type">
                            <option value="">Select One</option>
                            <option v-for="type in types" :value="type.type"> {{type.name}}</option>
                        </select>
                        <div class="invalid-feedback" v-if="!$v.phone.type">Select type</div>
                    </div>
                    <div class="form-group">
                        <label for="text">Message</label>
                        <textarea
                            @blur="$v.text.$touch()"
                            :class="{'is-invalid':$v.text.$error}"
                            v-model="text"
                            class="form-control" id="text" rows="3"></textarea>
                        <div class="invalid-feedback" v-if="!$v.phone.text">Message is required</div>
                    </div>
                    <button
                        :disabled="$v.$invalid"
                        class="btn btn-success">Send</button>
                    <div :class="responseInfo" class="response-info mt-2" ref="response_info"></div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { required, numeric } from 'vuelidate/lib/validators'
    export default {
        data: function () {
            return {
                name: '',
                phone:'',
                type:'',
                text:'',
                types:[],
                responseInfo:''
            }
        },
        validations:{
            name:{
                required
            },
            phone:{
                required,
                numeric
            },
            type:{
                required
            },
            text:{
                required
            }
        },
        mounted() {
            axios
                .get('/types')
                .then(response => (this.types = response.data));
        },
        methods: {
            onSubmit: function () {

                var formData = new FormData();
                formData.append('name', this.name);
                formData.append('phone', this.phone);
                formData.append('type', this.type);
                formData.append('text', this.text);

                axios.post('/feedback',formData)
                    .then(response => {
                        if(response.data == true){
                            this.name = '';this.phone = '';this.text = '';
                            this.$v.$reset();
                            this.$refs.response_info.innerHTML = 'Feedback is sent';
                            this.responseInfo = 'text-success';
                        }else{
                            this.$refs.response_info.innerHTML = 'Something  wrong';
                            this.responseInfo = 'text-danger';
                        }
                    });
            }
        }
    }
</script>
