<template>
  <v-card
        class="mx-auto"
        max-width="344"
        elevation="2"
        outlined
    >
        <v-card-title>Login</v-card-title>
        <form>
            <v-col
                sm="12"
            >
                <v-text-field
                    v-model="name"
                    :error-messages="nameErrors"
                    :counter="50"
                    label="Name"
                    required
                    @input="$v.name.$touch()"
                    @blur="$v.name.$touch()"
                ></v-text-field>
            </v-col>
            <v-col
                sm="12"
            >
                <v-text-field
                    type="password"
                    v-model="password"
                    :error-messages="passwordErrors"
                    :counter="50"
                    label="Password"
                    required
                    @input="$v.password.$touch()"
                    @blur="$v.password.$touch()"
                ></v-text-field>
            </v-col>
            <v-card-actions>
                <v-btn
                class="mr-4"
                @click="submit"
                >
                submit
                </v-btn>
            </v-card-actions>
        </form>
    </v-card>
</template>

<script>
import { mapActions } from "vuex";
import { validationMixin } from 'vuelidate'
import { required, maxLength, email } from 'vuelidate/lib/validators'

export default {
    name: "Login",
    components: {},
    mixins: [validationMixin],

    validations: {
      name: { required, maxLength: maxLength(50) },
      email: { required, email },
      password: { required, maxLength: maxLength(50)}
    },

    data() {
        return {
            username: "",
            password: "",
            form: {
                username: "",
                password: "",
        },
        showError: false
        };
    },

    computed:{
      nameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.maxLength && errors.push('Name must be at most 50 characters long')
        !this.$v.name.required && errors.push('Name is required.')
        return errors
      },
      passwordErrors () {
        const errors = []
        if (!this.$v.password.$dirty) return errors
        !this.$v.password.maxLength && errors.push('Password must be at most 50 characters long')
        !this.$v.password.required && errors.push('Password is required')
        return errors
      },
    },

    methods: {
        ...mapActions(["LogIn"]),
        async submit() {
            this.form.username = this.username
            this.form.password = this.password
            const User = new FormData();
            User.append("username", this.form.username);
            User.append("password", this.form.password);
            try {
                await this.LogIn(User);
                this.$router.push("/posts");
                this.showError = false
            } catch (error) {
                this.showError = true
            }
        },
    },
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  cursor: pointer;
  border-radius:30px;
}
button[type=submit]:hover {
  background-color: #45a049;
}
input {
  margin: 5px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
  padding:10px;
  border-radius:30px;
}
#error {
  color: red;
}
</style>