import AuthLayout from "@/app/(client)/auth/layout.jsx";
import Link from 'next/link';

export const metadata = {
    title: "Login",
    description: "Login Page",
};

export default function Login() {
    return (
        <AuthLayout>
            <div className="min-h-screen flex items-center justify-center w-full dark:bg-gray-950 px-4">
                <div className="bg-white dark:bg-gray-900 shadow-md rounded-lg px-4 py-6 max-w-md w-full">
                    <h1 className="text-2xl font-bold text-center mb-1 dark:text-gray-200">Đăng nhập</h1>
                    <p className="text-sm text-center mb-4">Bạn chưa có tài khoản?
                        <Link href="/auth/register" passHref>
                            <span className="text-indigo-500 underline"> Đăng ký</span>
                        </Link>
                    </p>
                    <form action="#">
                    <div className="mb-4">
                            <label htmlFor="email"
                                   className="block text-[15px] font-semibold text-gray-700 dark:text-gray-300 mb-0.5">Email</label>
                            <input type="email" id="email"
                                   className="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="Email" required/>
                        </div>
                        <div className="mb-4">
                            <label htmlFor="password"
                                   className="block text-[15px] font-semibold text-gray-700 dark:text-gray-300 mb-0.5">Mật
                                khẩu</label>
                            <input type="password" id="password"
                                   className="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="Mật khẩu" required/>
                            <a href="#"
                               className="text-xs text-gray-600 hover:text-indigo-500">
                                Quên mật khẩu
                            </a>
                        </div>
                        <button type="submit"
                                className="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-base
                                font-medium text-white bg-indigo-600 hover:bg-indigo-700 mb-3 mt-2">
                            Đăng nhập
                        </button>
                    </form>
                </div>
            </div>
        </AuthLayout>
    )
}