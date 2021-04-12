var shallowMount = require("@vue/test-utils").shallowMount;
var Sandbox = require('../../resources/js/components/sandbox.vue').default;

describe('FancyHeading.vue', () => {
    it('should be the correct color', () => {
        const wrapper = shallowMount(Sandbox, {
            propsData: { a: 2 }
        });
        expect(wrapper.text()).toMatch(msg);
    });
});
