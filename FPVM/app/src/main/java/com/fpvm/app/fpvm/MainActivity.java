package com.fpvm.app.fpvm;

import android.content.Intent;
import android.os.Handler;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.fpvm.app.fpvm.myrequest.Myrequest;

public class MainActivity extends AppCompatActivity {
    private TextInputLayout til_pseudo, til_password;
    private Button btn_send;
    private ProgressBar pg_bar;
    private RequestQueue queue;
    private Myrequest myrequest;
    private Handler handler;
    private SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sessionManager=new SessionManager(this);

        if(sessionManager.isLogged()){
            Intent i=new Intent(this,NavigationActivity.class);
            startActivity(i);
            finish();
        }

        til_pseudo=(TextInputLayout)findViewById(R.id.til_pseudo);
        til_password=(TextInputLayout)findViewById(R.id.til_password);
        btn_send=(Button) findViewById(R.id.btn_send);
        pg_bar=(ProgressBar)findViewById(R.id.pgr_bar);

        queue=VolleySingleton.getInstance(this).getRequestQueue();
        myrequest=new Myrequest(this,queue);
        handler=new Handler();
        sessionManager=new SessionManager(this);

        btn_send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String pseudo=til_pseudo.getEditText().getText().toString().trim();
                final String password=til_password.getEditText().getText().toString().trim();
                pg_bar.setVisibility(View.VISIBLE);

                if(pseudo.length()>0 && password.length()>0){
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {

                            myrequest.connection(pseudo, password, new Myrequest.LoginCallback() {
                                @Override
                                public void onSuccess(String id, String pseudo) {
                                    pg_bar.setVisibility(View.GONE);
                                    sessionManager.insertUser(id,pseudo);
                                    Intent i=new Intent(getApplicationContext(),NavigationActivity.class);
                                    startActivity(i);
                                    finish();
                                }

                                @Override
                                public void onErrors(String message) {
                                    pg_bar.setVisibility(View.GONE);
                                    Toast.makeText(getApplicationContext(),message,Toast.LENGTH_LONG).show();
                                }
                            });
                        }
                    },1000);}else
                {
                    Toast.makeText(getApplicationContext(),"Veuillez remplir tous les champ",Toast.LENGTH_LONG).show();
                }
            }
        });

    }
}
