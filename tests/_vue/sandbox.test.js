import {createLocalVue, shallowMount} from "@vue/test-utils";
import Sandbox from '../../resources/js/components/sandbox.vue';

describe('Sandbox.vue', () => {
    let localVue;

    beforeEach(() => {
        localVue = createLocalVue();
    })

    it('should be the correct text', () => {
        const wrapper = shallowMount(Sandbox, {
            localVue,
            data: () => ({a: 2})
        });
        expect(wrapper.text()).toMatch('Sandbox 2');
        const wrapper2 = shallowMount(Sandbox, {
            data: () => ({a: 6, b: 1})
        });
        expect(wrapper2.text()).toMatch('Sandbox 6');
        expect(wrapper2.find('p').text()).toMatch('1');
    });
});
