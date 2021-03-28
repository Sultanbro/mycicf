import {useState} from 'react';

export type UseLocalStorage = <T>(key: string, initialState: T, deleteOn?: T | (() => T)) => [T, (value: T) => void];

/**
 * Returns a hook for LocalStorage values
 *
 * @param prefix A prefix
 */
export function createUseLocalStorage(prefix: string): UseLocalStorage {
    return <T>(key: string, initialState: T | (() => T), deleteOn: T | (() => T) = initialState) =>
        useStateWithLocalStorage(`${prefix}::${key}`, initialState, deleteOn);
}

/**
 * Use state value from LocalStorage
 * @param key A key prefix
 * @param initialState initial state
 * @param deleteOn A value that handle deleting local storage key
 */
export function useStateWithLocalStorage<T>(
    key: string,
    initialState: T | (() => T),
    deleteOn: T | (() => T) = initialState
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
            if (val === deleteOn) {
                localStorage.removeItem(key);
            } else {
                localStorage.setItem(key, JSON.stringify(val));
            }
            setV(val);
        }
    ];
}
