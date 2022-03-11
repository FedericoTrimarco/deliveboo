<template>
    <div class="custom-form-braintree-container">
        <div class="custom-form-braintree-container-wrapper">
            <v-braintree
                :authorization="authorization"
                @success="onSuccess"
                @error="onError"
                @load="onLoad"
                v-if="authorization"
                locale="it_IT"
                :transaltion="{ cvvLabel: 'CVV' }"
            >
                <template v-slot:button="slotProps" v-if="authorization">
                    <v-btn
                        @click="slotProps.submit"
                        color="success"
                        ref="buttonRef"
                    ></v-btn>
                </template>
            </v-braintree>
            <p v-if="error">{{ error }}</p>
        </div>
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
        onLoad(status) {
            status = true;
            this.$emit("onLoad", status);
        },
    },
};
</script>

<style lang="scss">
.custom-form-braintree-container {
    display: flex;
    min-height: 340px;
    position: relative;

    .custom-form-braintree-container-wrapper {
        > .payment {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: absolute;

            .braintree-sheet__header {
                border-bottom: 2px solid #ebebeb;
            }

            .braintree-sheet {
                border-radius: 0;
                border: 2px solid #ebebeb;
            }

            .braintree-form__hosted-field {
                border: 2px solid #ebebeb;

                &:hover {
                    border-color: #ebebeb !important;
                }
            }

            .braintree-placeholder {
                // height: 0 !important;
                color: #ca2a2a !important;
            }

            .braintree-upper-container::before {
                background-color: transparent !important;
            }
        }
    }
}
</style>
