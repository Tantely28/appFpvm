package com.fpvm.app.fpvm.myrequest;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by tombo on 27/04/2019.
 */

public class Myrequest {
    private Context context;
    private RequestQueue queue;

    public Myrequest(Context context, RequestQueue queue) {
        this.context = context;
        this.queue = queue;
    }

    public void register(final String pseudo, final String email, final String password, final String password2, final RegisterCallback callback)
    {
        String url="http://192.168.43.157/register.php";
        StringRequest request=new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Map<String, String> errors=new HashMap<>();

                try {
                    JSONObject json=new JSONObject(response);
                    Boolean error = json.getBoolean("error");
                    if(!error)
                    {
                        callback.onSuccess("Vous etes bien inscrit");
                    }else{
                    JSONObject message= json.getJSONObject("message");

                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                Log.d("APP", response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                if(error instanceof NetworkError){
                    callback.onErrors("Impossible de se connecter");
                }else if(error instanceof VolleyError){
                    callback.onErrors("Une erreur se produie");
                }

                Log.d("APP", "erreur="+error);
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> map= new HashMap<>();
                map.put("pseudo", pseudo);
                map.put("email",email);
                map.put("password",password);
                map.put("password2",password2);
                return map;
            }
        };
        queue.add(request);
    }

    public interface RegisterCallback
    {
        void onSuccess(String message);
        void inputErrors(Map<String, String> errors);
        void onErrors(String message);
    }

    public void connection(final String pseudo, final String password, final LoginCallback loginCallback){
        String url="http://192.168.88.193:8000/api/login/mpiangona";

        StringRequest request=new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject j=new JSONObject(response);
                    Boolean error=j.getBoolean("error");
                    if(!error){
                        String id=j.getString("id");
                        String anarana=j.getString("anarana");
                        loginCallback.onSuccess(id,anarana);
                    }else{
                        loginCallback.onErrors(j.getString("message"));
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                if(error instanceof NetworkError){
                    loginCallback.onErrors("Impossible de se connecter");
                }else if(error != null){
                    loginCallback.onErrors("Une erreur se produie");
                }

                Log.d("APP", "erreur="+error);
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> map= new HashMap<>();
                map.put("login", pseudo);
                map.put("mdp",password);
                return map;
            }
        };
        queue.add(request);
    }

    public interface LoginCallback
    {
        void onSuccess(String id, String pseudo);
        void onErrors(String message);
    }

}
