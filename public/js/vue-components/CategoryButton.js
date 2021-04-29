const categoryButtonComponent = {
  template: `
  <ul>
    <li id="tabs-menu-0" :class="getActiveClass(0)" @click="getCategoryNo(0)">전체</li>
    <li v-for="category in categories" :id="getId(category.id)" :class="[getActiveClass(category.id), getCategoryClass(category.id)]" @click="getCategoryNo(category.id)">{{category.name}}</li>
  </ul>
  `,
  props: ['modelValue', 'categories'],
  methods: {
    getCategoryNo(index) {
      const selectedCategoryNo = Number.parseInt(index);
      this.$emit('child-click', selectedCategoryNo);
    },
    getId(index) {
      return `tabs-menu-${index}`;
    },
    getActiveClass(index) {
      return parseInt(this.modelValue) === parseInt(index) ? 'active' : '';
    },
    getCategoryClass(index) {
      return `category-${index}`;
    },
  },
};
