<template>
    <v-card
        class="mx-auto"
        max-width="344"
        elevation="2"
        outlined
    >
        <v-card-title>Put in your data</v-card-title>
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
                    v-model="email"
                    :error-messages="emailErrors"
                    label="E-mail"
                    required
                    @input="$v.email.$touch()"
                    @blur="$v.email.$touch()"
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
    name: "Register",
    mixins: [validationMixin],
    components: {},

    validations: {
      name: { required, maxLength: maxLength(50) },
      email: { required, email },
      password: { required, maxLength: maxLength(50)}
    },

  data() {
    return {
        name: "",
        email: "",
        password: "",
        form: {
            name: "",
            email: "",
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
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Must be valid e-mail')
        !this.$v.email.required && errors.push('E-mail is required')
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
    ...mapActions(["Register"]),
    async submit() {
      try {
            this.form.name = this.name
            this.form.email = this.email
            this.fomr.password = this.password
            await this.Register(this.form);
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