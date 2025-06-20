// eslint-disable-next-line tailwindcss/no-custom-classname

import Footer from "./modules/Footer";
import Header from "./modules/Header";
import Inicio from "./pages/Inicio";

import "../../fonts/fonts.css";
import { Route, Routes, useLocation } from "react-router-dom";
import { AnimatePresence } from "framer-motion";
import PageTransition from "./components/PageTransition";
import BolsaTrabajo from "./pages/BolsaTrabajo";
import { useEffect, useReducer } from "react";
import { lightPages } from "./utils/const";
import Eventos from "./pages/Eventos";
import SucursalDetalle from "./pages/SucursalDetalle";
import axios from "axios";
import AppContext from "./Context/AppContext";

import "./lang/i18n";
import { MessageConsent } from "./components/MessageConsent";
import { Politicas } from "./pages/Politicas";
import { Toaster } from "sonner";
import { PoliticasReservacion } from "./pages/PoliticasReservacion";

const initialArgs = {
    loading: true,
    website: null,
    sucursals: [],
    galeria: [],
};
const reducer = (prev, next) => ({ ...prev, ...next });

export default function Web() {
    const location = useLocation();
    const [state, dispatch] = useReducer(reducer, initialArgs);

    useEffect(() => {
        setTimeout(() => {
            if (lightPages.includes(location.pathname)) {
                document.querySelector("body").classList.remove("bg-negro");
                document.querySelector("body").classList.add("bg-blanco");
            } else {
                document.querySelector("body").classList.remove("bg-blanco");
                document.querySelector("body").classList.add("bg-negro");
            }
        }, 500);
    }, [location?.pathname]);

    useEffect(() => {
        async function fetchData() {
            const response = await axios.get(
                import.meta.env.VITE_APP_URL + "api/initial",
            );

            const { website, sucursals, galeria } = response.data;
            website.translations.forEach((translation) => {
                let locale = translation.locale;
                website[locale] = translation;
            });
            dispatch({ website, sucursals, galeria });

            setTimeout(() => {
                dispatch({ loading: false });
            }, 1500);
        }
        fetchData();
    }, []);

    if (state.loading)
        return (
            <div className="flex h-screen w-full items-center justify-center bg-white text-black">
                <span className="spinner"></span>
            </div>
        );

    return (
        <AppContext.Provider value={{ state, dispatch }}>
            <Header location={location.pathname} />

            <Toaster />

            <main className="mx-auto min-h-svh pt-[57px] sm:pt-[65px] md:pt-[74px]">
                <AnimatePresence mode="wait">
                    <Routes location={location} key={location.pathname}>
                        <Route
                            index
                            exact
                            path="/"
                            element={
                                <PageTransition>
                                    <Inicio />
                                </PageTransition>
                            }
                        />

                        <Route
                            path="/bolsa-de-trabajo"
                            element={
                                <PageTransition>
                                    <BolsaTrabajo />
                                </PageTransition>
                            }
                        />
                        <Route
                            path="/politicas-privacidad"
                            element={
                                <PageTransition>
                                    <Politicas />
                                </PageTransition>
                            }
                        />
                        <Route
                            path="/politicas-reservacion"
                            element={
                                <PageTransition>
                                    <PoliticasReservacion />
                                </PageTransition>
                            }
                        />
                        <Route
                            path="/eventos"
                            element={
                                <PageTransition>
                                    <Eventos />
                                </PageTransition>
                            }
                        />
                        <Route
                            path="/sucursal/:slug"
                            element={
                                <PageTransition>
                                    <SucursalDetalle />
                                </PageTransition>
                            }
                        />
                    </Routes>
                </AnimatePresence>
            </main>
            <Footer />
            <MessageConsent />
        </AppContext.Provider>
    );
}
