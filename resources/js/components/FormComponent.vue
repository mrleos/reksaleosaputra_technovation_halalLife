<template>
    <div>
        <form @submit.prevent="submitForm">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" v-model="form.name" @input="validateName">
                <span v-if="errors.name">{{ errors.name }}</span>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: ''
            },
            errors: {}
        };
    },
    methods: {
        validateName() {
            this.errors.name = '';
            if (this.form.name.length < 3) {
                this.errors.name = 'Name must be at least 3 characters long';
            }
        },
        submitForm() {
            // Submit form logic here
        }
    }
};
</script>
