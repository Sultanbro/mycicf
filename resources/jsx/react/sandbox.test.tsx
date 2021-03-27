import {Sandbox, sum} from '../sandbox';
import React from 'react';
import TestRenderer from 'react-test-renderer';

describe('sandbox tests', () => {
    it('sandbox', () => {
        const testRenderer = TestRenderer.create(<Sandbox />);
        const testInstance = testRenderer.root;

        expect(testInstance.children.length).toEqual(1);
        expect((testInstance.children[0] as any).children).toEqual(1);
    });
    it('sandbox 2', () => {
        expect(sum(1, 5)).toBe(6);
    });
    it('sandbox 3', () => {
        expect((1 + 5)).toBe(6);
    });
});
