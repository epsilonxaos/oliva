import { useContext, useEffect } from "react";
import FadeInUpDiv from "../components/FadeInUp";
import Bienvenida from "../components/Inicio/Bienvenida";
import Contacto from "../components/Inicio/Contacto";
import Instagram from "../components/Inicio/Instagram";
import Sucursales from "../components/Inicio/Sucursales";
import Video from "../components/Inicio/Video";
import AppContext from "../Context/AppContext";
import { _PATH_SOURCES } from "../utils/const";

const Inicio = () => {
    const { state } = useContext(AppContext);

    console.log(state);

    useEffect(() => {
        const script = document.createElement("script");
        script.src = "/js/instafeed.js";
        script.async = true;

        script.onload = () => {
            var feed = new window.Instafeed({
                accessToken:
                    "IGQWRNbnFTVFJZAZAUdHT0J1a2VJZAm4zb3VtbFRueWkwanpPYUdDQ1M5ajcxWTJGM2NVMExtWGRqVjdOVEg2dGpHaGJjWVU4alQ2Q1hUcDhvb1ZAJRmc1RXZADWU1UX0VhS0lDbHhKdWZAUbkhFdTNhOV9USXVwLTVfcGMZD",
            });
            feed.run();
        };

        document.body.appendChild(script);

        return () => {
            document.body.removeChild(script);
        };
    }, []);

    return (
        <div className="text-black">
            <div className="mx-auto max-w-[1600px]">
                <FadeInUpDiv>
                    <Video />
                </FadeInUpDiv>
                <Bienvenida />
            </div>
            <hr className="border-black" />
            <div className="mx-auto max-w-[1600px] ">
                <Sucursales />
            </div>
            <hr className="border-black" />
            <div className="mx-auto max-w-[1600px] ">
                {state.website.img_promo_movil && (
                    <img
                        className="mx-auto mt-16 w-[90%] shadow-lg shadow-gray-300 md:hidden"
                        src={_PATH_SOURCES + state.website.img_promo_movil}
                        alt=""
                    />
                )}
                {state.website.img_promo && (
                    <img
                        className="mx-auto mt-16 hidden w-[80%] shadow-lg shadow-gray-200 md:block"
                        src={_PATH_SOURCES + state.website.img_promo}
                        alt=""
                    />
                )}

                <Instagram />
            </div>
            <hr className="border-black md:hidden" />
            <div className="mx-auto max-w-[1600px] ">
                <Contacto />
            </div>
        </div>
    );
};

export default Inicio;
