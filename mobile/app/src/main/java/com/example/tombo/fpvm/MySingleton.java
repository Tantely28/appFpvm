package com.example.tombo.fpvm;

import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

/**
 * Created by tombo on 24/04/2019.
 */

public class MySingleton {
    private static MySingleton myInstance;
    private RequestQueue requestQueue;
    private static Context myContext;

    private MySingleton(Context context) {
        myContext = context;
        requestQueue = getRequestQueue();
    }

    public RequestQueue getRequestQueue() {
        if (requestQueue == null) {
            requestQueue = Volley.newRequestQueue(myContext.getApplicationContext());
        }

        return requestQueue;
    }

    public static synchronized MySingleton getInstance(Context context) {
        if (myInstance == null) {
            myInstance = new MySingleton(context);
        }

        return myInstance;
    }

    public <T> void addToRequestQue(Request<T> request) {
        getRequestQueue().add(request);
    }
}
