<template>
    <div class="custom-container">
        <v-braintree
            :authorization="authorization"
            @success="onSuccess"
            @error="onError"
            v-if="authorization"
            locale="it_IT"
            :transaltion="{ cvvLabel: 'CVV' }"
        >
            <template v-slot:button="slotProps" v-if="authorization">
                <v-btn @click="slotProps.submit" color="success" ref="buttonRef"
                    >Fancy button</v-btn
                >
            </template>
        </v-braintree>
        <p v-if="error">{{ error }}</p>
    </div>
</template>

<script>
export default {
    name: "Payment",
    props: {
        authorization: {
            required: true,
            type: String,
        },
    },
    data() {
        return {
            instance: null,
            error: "",
        };
    },
    methods: {
        onSuccess(payload) {
            // console.log("Success!", payload.nonce);
            let token = payload.nonce;
            this.$emit("onSuccess", token);
        },
        onError(error) {
            // console.log("Error!", error);
            let message = error.message;
            if (message == "No payment method is available.")
                this.error = "Seleziona un metodo di pagamento.";
            else this.error = message;

            this.$emit("onError", message);
        },
    },
};
</script>

<style lang="scss" scoped>
.custom-container {
    max-width: 480px;
}
</style>
