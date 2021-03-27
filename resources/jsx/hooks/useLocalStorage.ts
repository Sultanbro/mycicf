import { useState } from 'react';

export type UseLocalStorage = <T>(key: string, initialState: T) => [T, (value: T) => void];

/**
 * Returns a hook for LocalStorage values
 *
 * @param prefix A prefix
 */
export function createUseLocalStorage(prefix: string): UseLocalStorage {
    return <TT>(key: string, initialState: TT) =>
        useStateWithLocalStorage(`${prefix}::${key}`, initialState);
}

/**
 * Use state value from LocalStorage
 * @param key A key prefix
 * @param initialState initial state
 */
export function useStateWithLocalStorage<T>(
    key: string,
    initialState: T | (() => T)
): [T, (value: T) => void] {
    let item = localStorage.getItem(key);
    let value: T;
    if (!item) {
        value =
            typeof initialState === 'function'
                ? // eslint-disable-next-line @typescript-eslint/no-explicit-any
                (initialState as any)()
                : initialState;
    } else {
        value = JSON.parse(item);
    }

    let [v, setV] = useState<T>(value);

    return [
        v,
        (val: T) => {
            localStorage.setItem(key, JSON.stringify(val));
            setV(val);
        }
    ];
}
