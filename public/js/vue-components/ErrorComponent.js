const errorComponent = {
  props: ['error'],
  template: `
      <div class="error-message" role="alert" v-if="error">{{ error }}</div>
  `,
};
